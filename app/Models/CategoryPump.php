<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryPump extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'image',
    ];

    public function detailPumps()
    {
        return $this->hasMany(DetailPump::class);
    }
}
