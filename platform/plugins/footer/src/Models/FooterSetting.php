<?php

namespace Platform\Plugins\Footer\Models;

use Illuminate\Database\Eloquent\Model;

class FooterSetting extends Model
{
    protected $table = 'footer_settings';

    protected $fillable = [

        'name',
        'rector',
        'description',
        'address',
        'phone',
        'email',
        'website',
        'logo'

    ];
}
