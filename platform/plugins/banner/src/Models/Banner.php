<?php

namespace Platform\Plugins\Banner\Models;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $table = 'banners';

    protected $fillable = [
        'title',
        'description',
        'image',
        'link',
        'sort_order',
        'status'
    ];
}
