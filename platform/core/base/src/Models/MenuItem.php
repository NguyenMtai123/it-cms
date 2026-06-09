<?php

namespace Platform\Core\Base\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class MenuItem extends Model
{
    protected $table = 'menu_items';

    protected $fillable = [
        'menu_id',
        'parent_id',
        'label',
        'type',
        'url',
        'route_name',
        'route_params',
        'order',
        'target_blank',
        'is_active',
    ];

    protected $casts = [
        'route_params' => 'array',
        'target_blank' => 'boolean',
        'is_active' => 'boolean',
    ];

    public function menu(): BelongsTo
    {
        return $this->belongsTo(Menu::class, 'menu_id');
    }

    public function parent(): BelongsTo
    {
        return $this->belongsTo(self::class, 'parent_id');
    }

    public function children(): HasMany
    {
        return $this->hasMany(self::class, 'parent_id')->orderBy('order');
    }

}
