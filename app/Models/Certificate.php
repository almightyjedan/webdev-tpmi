<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    protected $fillable = ['general_description', 'certificate_items'];

    protected $casts = [
        'certificate_items' => 'array',
    ];
}
