<?php

namespace Platform\Core\Media\Services;

use Platform\Core\Media\Models\MediaFolder;

class MediaTreeService
{
    public function folderPath(?MediaFolder $folder): string
    {
        if (! $folder) {
            return 'media';
        }

        $segments = [];

        while ($folder) {
            array_unshift($segments, $folder->slug ?: 'folder');
            $folder = $folder->parent;
        }

        return 'media/' . implode('/', $segments);
    }

    public function breadcrumbs(?MediaFolder $folder): array
    {
        $breadcrumbs = [
            [
                'name' => 'All media',
                'url' => route('media.index'),
            ],
        ];

        if (! $folder) {
            return $breadcrumbs;
        }

        $stack = [];
        while ($folder) {
            array_unshift($stack, $folder);
            $folder = $folder->parent;
        }

        $current = [];
        foreach ($stack as $item) {
            $current['folder_id'] = $item->id;

            $breadcrumbs[] = [
                'name' => $item->name,
                'url' => route('media.index', $current),
            ];
        }

        return $breadcrumbs;
    }

    public function descendantIds(MediaFolder $folder): array
    {
        $ids = [];

        $children = MediaFolder::query()
            ->where('parent_id', $folder->id)
            ->get();

        foreach ($children as $child) {
            $ids[] = $child->id;
            $ids = array_merge($ids, $this->descendantIds($child));
        }

        return $ids;
    }
}
