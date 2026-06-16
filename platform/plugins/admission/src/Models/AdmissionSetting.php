<?php

namespace Platform\Plugins\Admission\Models;

use Illuminate\Database\Eloquent\Model;

class AdmissionSetting extends Model
{
    protected $table = 'admission_settings';

    protected $fillable = [
        'title',
        'banner_image',
        'banner_url',
        'career_image',
        'career_url',
        'background_image',
    ];
}
