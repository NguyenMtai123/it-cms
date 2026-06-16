<?php

namespace Platform\Plugins\Footer\Models;

use Illuminate\Database\Eloquent\Model;

class FooterLink extends Model
{
    protected $table = 'footer_links';

    protected $fillable = [

        'title',
        'url',
        'group',
        'sort_order',
        'status'

    ];
}
