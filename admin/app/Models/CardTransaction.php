<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CardTransaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'card_provider_id', 'serial', 'code', 'status', 'value',
        'real_value', 'real_cash', 'system_note', 'status'
    ];

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function card_provider() : BelongsTo
    {
        return $this->belongsTo(CardProvider::class);
    }
}
