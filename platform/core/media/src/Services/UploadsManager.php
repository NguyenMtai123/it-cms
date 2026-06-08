<?php

namespace Platform\Core\Media\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class UploadsManager
{
    public function upload(UploadedFile $file, string $folderPath = 'media'): array
    {
        $name = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        $extension = $file->getClientOriginalExtension() ?: $file->extension() ?: 'bin';

        $safeName = Str::slug($name) . '-' . time() . '-' . Str::random(6) . '.' . $extension;

        $path = $file->storeAs($folderPath, $safeName, 'public');

        return [
            'path' => $path,
            'name' => $file->getClientOriginalName(),
            'mime_type' => $file->getMimeType(),
            'size' => $file->getSize(),
        ];
    }

    public function delete(string $path): bool
    {
        return Storage::disk('public')->delete($path);
    }

    public function deleteDirectory(string $path): bool
    {
        return Storage::disk('public')->deleteDirectory($path);
    }

    public function moveFile(string $from, string $to): bool
    {
        $disk = Storage::disk('public');

        if (! $disk->exists($from)) {
            return false;
        }

        $directory = dirname($to);
        if ($directory && $directory !== '.') {
            $disk->makeDirectory($directory);
        }

        return $disk->move($from, $to);
    }

    public function moveDirectory(string $from, string $to): bool
    {
        $disk = Storage::disk('public');

        if (! $disk->exists($from)) {
            return false;
        }

        foreach ($disk->allFiles($from) as $file) {
            $newPath = str_replace($from, $to, $file);

            $directory = dirname($newPath);
            if ($directory && $directory !== '.') {
                $disk->makeDirectory($directory);
            }

            $disk->copy($file, $newPath);
        }

        $disk->deleteDirectory($from);

        return true;
    }
}
