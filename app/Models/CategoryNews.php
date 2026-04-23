<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryNews extends Model
{
    protected $fillable = ['name', 'slug'];

    public function news(): BelongsToMany
    {
        return $this->belongsToMany(News::class, 'category_news_news');
    }
}
