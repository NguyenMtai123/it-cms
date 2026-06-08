<?php

namespace Platform\Core\Base\Models;

use Illuminate\Database\Eloquent\Model;

class Plugin extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'provider',
        'description',
        'status',
        'is_active',
        'is_installed',
    ];

    protected $casts = [
        'status' => 'boolean',
        'is_active' => 'boolean',
        'is_installed' => 'boolean',
    ];
}
