<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'main_title',
        'title',
        'description',
        'images',
    ];

    protected $casts = [
        'images' => 'array',
    ];

    public function industries()
    {
        return $this->belongsToMany(Industry::class, 'project_industry');
    }

    public function detailPumps()
    {
        return $this->belongsToMany(DetailPump::class, 'project_detail_pump');
    }
}
