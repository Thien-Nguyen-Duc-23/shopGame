<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SendMail extends Model
{
    use HasFactory;

    protected $fillable = [
        'type', 'user_id', 'order_id', 'status', 'content', 'send_time', 'subject',
    ];

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function order() : BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

}
