<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CardExchangerRate extends Model
{
    use HasFactory;

    protected $fillable = [
        'card_exchanger_id', 'rate', 'card_provider', 'price'
    ];

    public function card_exchanger() : BelongsTo
    {
        return $this->belongsTo(CardExchanger::class, 'card_exchanger_id');
    }

    public function cardProvider() : BelongsTo
    {
        return $this->belongsTo(CardProvider::class, 'card_provider');
    }
}
