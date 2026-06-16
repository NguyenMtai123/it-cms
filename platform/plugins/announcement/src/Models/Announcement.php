<?php

namespace Platform\Plugins\Announcement\Models;

use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    protected $table = 'announcements';

    protected $fillable = [

        'title',
        'slug',
        'summary',
        'content',
        'attachment',
        'publish_at',
        'expired_at',
        'is_active',

    ];

    protected $casts = [
        'publish_at' => 'datetime',
        'expired_at' => 'datetime',
        'is_active' => 'boolean',
    ];
}
