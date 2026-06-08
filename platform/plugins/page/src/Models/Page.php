<?php

namespace Platform\Plugins\Page\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $table = 'pages';

    protected $fillable = [
        'name',
        'slug',
        'description',
        'content',
        'image',
        'status',
    ];

    protected $casts = [
        'status' => 'boolean',
    ];
}
