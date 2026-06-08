<?php

namespace Platform\Plugins\Blog\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    protected $fillable = [
        'name',
        'slug',
        'description',
        'parent_id',
        'status',
    ];

    protected $casts = [
        'status' => 'boolean',
    ];

    public function posts()
    {
        return $this->belongsToMany(
            Post::class,
            'post_categories',
            'category_id',
            'post_id'
        );
    }
    public function parent()
{
    return $this->belongsTo(self::class, 'parent_id');
}
}
