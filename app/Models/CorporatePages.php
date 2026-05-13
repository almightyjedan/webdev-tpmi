<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CorporatePages extends Model
{
    use HasFactory;

    protected $fillable = [
        // Kolom Corporate Data
        'corporate_info',
        'facilities_description',
        'affiliates',
        'facilities',

        // Kolom Corporate Profile
        'profile_content',
        'strategy_image',
        'quality_safety_policy',
        'quality_policy_content',
        'core_competence_content',
    ];

    protected $casts = [
        'corporate_info' => 'array',
        'affiliates' => 'array',
        'facilities' => 'array',
        'quality_safety_policy' => 'array',
    ];
}