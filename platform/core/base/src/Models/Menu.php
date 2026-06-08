<?php

namespace Platform\Core\Base\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Platform\Core\Base\Models\MenuItem;

class Menu extends Model
{
    protected $table = 'menus';

    protected $fillable = [
        'name',
        'slug',
        'location',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function items(): HasMany
    {
        return $this->hasMany(MenuItem::class, 'menu_id');
    }
}
