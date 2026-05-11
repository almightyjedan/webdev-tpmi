<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Qhse extends Model
{
    protected $fillable = [
        'hero_image',
        'hero_title',
        'hero_subtitle',
        'intro_text',
        'content_blocks',
        'gallery_images',
        'video_url',
        'infographic_image',
    ];

    protected $casts = [
        'content_blocks' => 'array',
        'gallery_images' => 'array',
    ];
}
