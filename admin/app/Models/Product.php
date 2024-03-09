<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'library_id', 'group_product_id', 'category_id', 'uri', 'name', 'description',
        'buyer_warning', 'pricing', 'sale_pricing', 'card_pricing', 'status', 'email_order_id', 'email_finish_order_id', 'order_requires'
    ];

    public function library() : BelongsTo
    {
        return $this->belongsTo(Library::class);
    }

    public function group_product() : BelongsTo
    {
        return $this->belongsTo(GroupProduct::class);
    }

    public function category() : BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function getCurrentPriceAttribute()
    {
        return $this->sale_pricing ?  number_format($this->sale_pricing,0,",",",") : number_format($this->pricing,0,",",",");
    }
}
