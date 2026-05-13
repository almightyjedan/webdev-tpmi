<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CorporatePages extends Model
{
    use HasFactory;

    protected $fillable = [
        'corporate_info',
        'facilities_description',
        'affiliates',
        'facilities',
    ];

    protected $casts = [
        'corporate_info' => 'array',
        'affiliates' => 'array',
        'facilities' => 'array',
    ];
}