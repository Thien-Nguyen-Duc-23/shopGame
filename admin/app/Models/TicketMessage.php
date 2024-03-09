<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TicketMessage extends Model
{
    use HasFactory;

    protected $fillable = [ 'ticket_id', 'user_id', 'content', ];

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }

}
