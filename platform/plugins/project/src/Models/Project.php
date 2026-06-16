<?php

namespace Platform\Plugins\Project\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table = 'projects';

    protected $fillable = [
        'name',
        'logo',
        'url',
        'sort_order',
        'status',
    ];
}
