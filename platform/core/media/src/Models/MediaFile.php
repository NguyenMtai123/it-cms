<?php

namespace Platform\Core\Media\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class MediaFile extends Model
{
    use SoftDeletes;

    protected $table = 'media_files';

    protected $fillable = [
        'user_id',
        'name',
        'alt',
        'folder_id',
        'mime_type',
        'size',
        'url',
        'visibility',
        'options',
    ];

    protected $casts = [
        'options' => 'array',
    ];

    public function folder(): BelongsTo
    {
        return $this->belongsTo(MediaFolder::class, 'folder_id');
    }
}
