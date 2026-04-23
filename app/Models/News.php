<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\Comments;

class News extends Model
{
    protected $fillable = [
        'image',
        'title',
        'slug',
        'description',
        'posted_by',
        'posted_at',
    ];

    protected $casts = [
        'posted_at' => 'datetime',
    ];

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(CategoryNews::class, 'category_news_news');
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comments::class);
    }
}