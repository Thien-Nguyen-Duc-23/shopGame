<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CardExchanger extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'send_url', 'get_rate_url', 'status', 'partner_id'
    ];

    public function cardExchangerRates() : HasMany
    {
        return $this->hasMany(CardExchangerRate::class);
    }
}
