<?php

namespace Platform\Plugins\Blog\Models;

use Illuminate\Database\Eloquent\Model;
use Platform\Plugins\Blog\Models\Category;
use Platform\Plugins\Blog\Models\Tag;

class Post extends Model
{
    protected $table = 'posts';

    protected $fillable = [
        'title',
        'slug',
        'description',
        'content',
        'image',
        'views', // thêm dòng này
        'status',
        'is_featured',
        'author_id',
    ];

    protected $casts = [
        'status' => 'boolean',
        'is_featured' => 'boolean',
    ];

    public function categories()
    {
        return $this->belongsToMany(
            Category::class,
            'post_categories',
            'post_id',
            'category_id'
        );
    }

    public function tags()
    {
        return $this->belongsToMany(
            Tag::class,
            'post_tags',
            'post_id',
            'tag_id'
        );
    }
    public function author()
    {
        return $this->belongsTo(
            \Platform\Core\ACL\Models\User::class,
            'author_id'
        );
    }
}
