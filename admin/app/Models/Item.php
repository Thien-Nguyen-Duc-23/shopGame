<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id', 'order_id', 'content', 'status', 'deliver_at'
    ];

    public function product() : BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
