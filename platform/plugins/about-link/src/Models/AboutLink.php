<?php

namespace Platform\Plugins\AboutLink\Models;

use Illuminate\Database\Eloquent\Model;

class AboutLink extends Model
{
    protected $table = 'about_links';

    protected $fillable = [
        'title',
        'icon',
        'url',
        'sort_order',
        'status',
    ];
}
