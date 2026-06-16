<?php

namespace Platform\Packages\Page\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Page extends Model
{
    use SoftDeletes;

    protected $table = 'pages';

    protected $fillable = [
        'title',
        'slug',
        'parent_id',
        'excerpt',
        'content',
        'image',
        'file',
        'status',
        'published_at',
    ];

    protected $casts = [
        'status' => 'boolean',
        'published_at' => 'datetime',
    ];

    public function parent()
    {
        return $this->belongsTo(Page::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Page::class, 'parent_id');
    }

    public function getUrlAttribute()
    {
        $segments = [$this->slug];

        $parent = $this->parent;

        while ($parent) {

            array_unshift($segments, $parent->slug);

            $parent = $parent->parent;
        }

        return url(implode('/', $segments));
    }
}
