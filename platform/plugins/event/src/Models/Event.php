<?php

namespace Platform\Plugins\Event\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'events';

    protected $fillable = [
        'title',
        'slug',
        'description',
        'content',
        'location',
        'start_date',
        'end_date',
        'image',
        'status',
    ];

    protected $casts = [
        'status' => 'boolean',
        'start_date' => 'datetime',
        'end_date' => 'datetime',
    ];
}
