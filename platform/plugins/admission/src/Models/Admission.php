<?php

namespace Platform\Plugins\Admission\Models;

use Illuminate\Database\Eloquent\Model;

class Admission extends Model
{
    protected $table = 'admissions';

    protected $fillable = [
        'title',
        'description',
        'url',
        'sort_order',
        'status',
    ];
}
