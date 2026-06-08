<?php

namespace Platform\Core\Media\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Str;
use Platform\Core\Media\Models\MediaFile;
use Platform\Core\Media\Models\MediaFolder;
use Platform\Core\Media\Services\MediaTreeService;
use Platform\Core\Media\Services\UploadsManager;

class MediaFolderController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:120'],
            'parent_id' => ['nullable', 'integer'],
        ]);

        MediaFolder::create([
            'user_id' => auth()->id(),
            'name' => $request->name,
            'slug' => Str::slug($request->name) . '-' . time(),
            'parent_id' => (int) $request->input('parent_id', 0),
            'color' => $request->input('color'),
        ]);

        return back()->with('success', 'Folder created');
    }

    public function rename(Request $request, int $id, MediaTreeService $treeService, UploadsManager $uploadsManager)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:120'],
        ]);

        $folder = MediaFolder::query()->findOrFail($id);

        $oldPath = $treeService->folderPath($folder);

        $folder->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name) . '-' . time(),
        ]);

        $newPath = $treeService->folderPath($folder->fresh());

        $uploadsManager->moveDirectory($oldPath, $newPath);

        MediaFile::query()
            ->where('url', 'like', $oldPath . '%')
            ->get()
            ->each(function (MediaFile $file) use ($oldPath, $newPath): void {
                $file->update([
                    'url' => str_replace($oldPath, $newPath, $file->url),
                ]);
            });

        return back()->with('success', 'Folder renamed');
    }

    public function destroy(int $id, MediaTreeService $treeService, UploadsManager $uploadsManager)
{
    $folder = MediaFolder::query()->findOrFail($id);

    $ids = array_merge([$folder->id], $treeService->descendantIds($folder));
    $rootPath = $treeService->folderPath($folder);

    // Xóa file/folder trên storage
    $uploadsManager->deleteDirectory($rootPath);

    // Xóa thật trong DB
    MediaFile::withTrashed()
        ->whereIn('folder_id', $ids)
        ->forceDelete();

    MediaFolder::withTrashed()
        ->whereIn('id', $ids)
        ->forceDelete();

    return back()->with('success', 'Folder deleted');
}

}
