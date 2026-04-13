<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class DetailPump extends Model
{
    protected $fillable = ['category_pump_id', 'pump_type_id', 'model_name', 'description'];

    public function categoryPump(): BelongsTo {
        return $this->belongsTo(CategoryPump::class);
    }

    public function pumpType(): BelongsTo {
        return $this->belongsTo(PumpType::class);
    }

    public function industries(): BelongsToMany {
        return $this->belongsToMany(Industry::class,'detail_pump_industry','detail_pump_id','industry_id');
    }
}