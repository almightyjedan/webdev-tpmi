<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PumpTestFacility extends Model
{
    protected $table = 'pump_test_facilities';

    protected $fillable = [
        'hero_image',
        'main_description',
        'specifications',
        'equipments',
        'pump_test_lines',
        'pump_test_with_engine',
        'latest_activities',
    ];

    protected $casts = [
        'specifications' => 'array',
        'equipments' => 'array',
        'pump_test_with_engine' => 'array',
        'latest_activities' => 'array',
    ];
}