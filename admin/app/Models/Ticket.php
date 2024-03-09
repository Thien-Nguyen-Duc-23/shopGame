<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [ 'user_id', 'user_handle_id', 'title', 'content', 'status'];

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function user_handle() : BelongsTo
    {
        return $this->belongsTo(User::class, 'user_handle_id','id');
    }

}
