<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'transaction_id', 'user_id', 'product_id', 'unit_price', 'total', 'quantity',
        'discouted', 'partner_rate', 'received_at', 'completed_at', 'processor_id',
        'library_id', 'buyer_note', 'admin_note', 'banking_code', 'status'
    ];

    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i',
        'received_at' => 'datetime:Y-m-d H:i',
        'completed_at' => 'datetime:Y-m-d H:i'
    ];

    public function library() : BelongsTo
    {
        return $this->belongsTo(Library::class);
    }

    public function product() : BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function order_infos() : HasMany
    {
        return $this->hasMany(OrderInfo::class);
    }

    public function payment() : HasOne
    {
        return $this->hasOne(Payment::class);
    }

    public function getProductAndUserNameAttribute()
    {
        $name = "Order ID: " . $this->id;
        $name .= !empty($this->user) ? ' - Khách: ' . $this->user->full_name : $name;
        $name .= !empty($this->product) ? ' - Tên sản phẩm: ' . $this->product->name : $name;

        return $name;
    }

    public function processor() : BelongsTo
    {
        return $this->belongsTo(User::class, 'processor_id');
    }
}
