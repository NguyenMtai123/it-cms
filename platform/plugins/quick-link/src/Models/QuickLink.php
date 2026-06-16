<?php

namespace Platform\Plugins\QuickLink\Models;

use Illuminate\Database\Eloquent\Model;

class QuickLink extends Model
{
    protected $table = 'quick_links';

    protected $fillable = [
        'title',
        'subtitle',
        'url',
        'background_color',
        'sort_order',
        'status',
    ];
}
