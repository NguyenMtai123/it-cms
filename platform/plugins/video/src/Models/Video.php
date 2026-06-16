<?php

namespace Platform\Plugins\Video\Models;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $table = 'videos';

    protected $fillable = [
        'title',
        'embed_url',
        'description',
        'sort_order',
        'status',
    ];
}
