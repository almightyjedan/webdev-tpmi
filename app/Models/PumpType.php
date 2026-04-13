<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PumpType extends Model
{
    protected $fillable = ['name', 'slug'];

    public function detailPumps(): HasMany
    {
        return $this->hasMany(DetailPump::class, 'pump_type_id');
    }
}