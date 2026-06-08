<?php

namespace Platform\Core\Media\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Str;
use Platform\Core\Media\Models\MediaFile;
use Platform\Core\Media\Models\MediaFolder;
use Platform\Core\Media\Services\MediaTreeService;
use Platform\Core\Media\Services\UploadsManager;

class MediaController extends Controller
{
    public function index(Request $request, MediaTreeService $treeService)
    {
        $currentFolderId = (int) $request->input('folder_id', 0);

        $currentFolder = $currentFolderId
            ? MediaFolder::query()->find($currentFolderId)
            : null;

        $folders = MediaFolder::query()
            ->where('parent_id', $currentFolderId)
            ->orderBy('name')
            ->get();

        $files = MediaFile::query()
            ->where('folder_id', $currentFolderId)
            ->latest()
            ->paginate(24);

        $breadcrumbs = $treeService->breadcrumbs($currentFolder);

        $rootFolders = MediaFolder::query()
            ->where('parent_id', 0)
            ->orderBy('name')
            ->get();

        return view('media::index', compact(
            'folders',
            'files',
            'currentFolder',
            'currentFolderId',
            'breadcrumbs',
            'rootFolders'
        ));
    }

    public function upload(Request $request, UploadsManager $uploadsManager, MediaTreeService $treeService)
    {
        $request->validate([
            'file' => ['required'],
        ]);

        $folderId = (int) $request->input('folder_id', 0);
        $folder = $folderId ? MediaFolder::query()->findOrFail($folderId) : null;
        $folderPath = $treeService->folderPath($folder);

        $uploadedFiles = $request->file('file');
        $uploadedFiles = is_array($uploadedFiles) ? $uploadedFiles : [$uploadedFiles];

        foreach ($uploadedFiles as $file) {
            $data = $uploadsManager->upload($file, $folderPath);

            MediaFile::create([
                'user_id' => auth()->id(),
                'name' => $data['name'],
                'alt' => null,
                'folder_id' => $folderId,
                'mime_type' => $data['mime_type'],
                'size' => $data['size'],
                'url' => $data['path'],
                'visibility' => 'public',
                'options' => null,
            ]);
        }

        return back()->with('success', 'Uploaded successfully');
    }

    public function renameFile(Request $request, int $id, UploadsManager $uploadsManager)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:120'],
        ]);

        $file = MediaFile::query()->findOrFail($id);

        $oldPath = $file->url;
        $pathInfo = pathinfo($oldPath);

        $extension = $pathInfo['extension'] ?? '';
        $baseName = Str::slug(pathinfo($request->name, PATHINFO_FILENAME));

        $newFileName = $baseName . ($extension ? '.' . $extension : '');
        $newPath = ($pathInfo['dirname'] !== '.' ? $pathInfo['dirname'] . '/' : '') . $newFileName;

        if ($oldPath !== $newPath) {
            $uploadsManager->moveFile($oldPath, $newPath);
        }

        $file->update([
            'name' => $request->name,
            'url' => $newPath,
        ]);

        return back()->with('success', 'File renamed');
    }

    public function moveFile(Request $request, int $id, MediaTreeService $treeService, UploadsManager $uploadsManager)
    {
        $request->validate([
            'folder_id' => ['nullable', 'integer'],
        ]);

        $file = MediaFile::query()->findOrFail($id);

        $newFolderId = (int) $request->input('folder_id', 0);
        $folder = $newFolderId ? MediaFolder::query()->findOrFail($newFolderId) : null;

        $oldPath = $file->url;
        $newFolderPath = $treeService->folderPath($folder);
        $fileName = basename($oldPath);

        $newPath = trim($newFolderPath, '/') . '/' . $fileName;

        if ($oldPath !== $newPath) {
            $uploadsManager->moveFile($oldPath, $newPath);
        }

        $file->update([
            'folder_id' => $newFolderId,
            'url' => $newPath,
        ]);

        return back()->with('success', 'File moved');
    }

    public function destroyFile(int $id, UploadsManager $uploadsManager)
    {
        $file = MediaFile::query()->findOrFail($id);

        $uploadsManager->delete($file->url);

        $file->forceDelete();

        return back()->with('success', 'File deleted');
    }


}
