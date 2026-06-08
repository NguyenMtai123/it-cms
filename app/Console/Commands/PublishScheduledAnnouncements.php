<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Platform\Core\Base\Models\Announcement;
class PublishScheduledAnnouncements extends Command
{
    protected $signature = 'announcement:publish';

    protected $description = 'Publish scheduled announcements';

    public function handle()
    {
        Announcement::query()
            ->where('status', 0)
            ->whereNotNull('published_at')
            ->where('published_at', '<=', now())
            ->update([
                'status' => 1,
            ]);

        return self::SUCCESS;
    }
}
