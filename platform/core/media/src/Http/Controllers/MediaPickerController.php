<?php

namespace Platform\Core\Media\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Platform\Core\Media\Models\MediaFile;
use Platform\Core\Media\Models\MediaFolder;
use Platform\Core\Media\Services\MediaTreeService;

class MediaPickerController extends Controller
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
            ->with('children.children')
            ->get();

        return view('media::picker', compact(
            'folders',
            'files',
            'currentFolder',
            'currentFolderId',
            'breadcrumbs',
            'rootFolders'
        ));
    }
}
