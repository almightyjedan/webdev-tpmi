<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comments extends Model
{
    // Tambahkan baris ini untuk "membuka pintu" kolom yang boleh diisi
    protected $fillable = [
        'news_id',
        'user_name',
        'comment_text',
    ];

    /**
     * Relasi balik ke News
     */
    public function news(): BelongsTo
    {
        return $this->belongsTo(News::class);
    }
}