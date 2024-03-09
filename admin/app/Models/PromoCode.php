<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PromoCode extends Model
{
    use HasFactory;

    protected $fillable = [
        'library_id', 'name', 'value', 'user_ids', 'product_group_ids', 'product_ids',
        'order_max_value', 'expired_at', 'status',
        'order_min_value',
        'type',
        'start_at',
        'discount_code',
        'is_disposable'
    ];

    public function getProductGroupIdTypeArrayAttribute()
    {
        return $this->product_group_ids ? array_map('intval', explode(',', $this->product_group_ids)) : [];;
    }

    public function getUserIdTypeArrayAttribute()
    {
        return $this->user_ids ? array_map('intval', explode(',', $this->user_ids)) : [];;
    }

    public function getProductIdTypeArrayAttribute()
    {
        return $this->product_ids ? array_map('intval', explode(',', $this->product_ids)) : [];;
    }

    public function library()
    {
        return $this->belongsTo(Library::class, 'library_id');
    }
}
