<?php

namespace Platform\Core\Media\Models;

use Illuminate\Database\Eloquent\Model;

class MediaSetting extends Model
{
    protected $table = 'media_settings';

    protected $fillable = [
        'key',
        'value',
        'media_id',
        'user_id',
    ];

    protected $casts = [
        'value' => 'array',
    ];
}
