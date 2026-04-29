<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $fillable = ['title', 'file_path', 'type', 'thumbnail', 'category', 'user_id'];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
