<?php

namespace Platform\Core\Media\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Platform\Core\Media\Models\MediaFile;
use Platform\Core\Media\Models\MediaFolder;

class MediaMoveController extends Controller
{
    public function moveFile(Request $request)
    {
        $request->validate([
            'file_id' => 'required|integer',
            'folder_id' => 'nullable|integer',
        ]);

        $file = MediaFile::findOrFail($request->file_id);
        $file->folder_id = $request->folder_id ?: 0;
        $file->save();

        return response()->json(['status' => true]);
    }

    public function moveFolder(Request $request)
    {
        $request->validate([
            'folder_id' => 'required|integer',
            'parent_id' => 'nullable|integer',
        ]);

        $folder = MediaFolder::findOrFail($request->folder_id);
        $folder->parent_id = $request->parent_id ?: 0;
        $folder->save();

        return response()->json(['status' => true]);
    }
}
