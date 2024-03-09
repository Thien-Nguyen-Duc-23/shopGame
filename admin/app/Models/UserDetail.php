<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id', 'phone', 'address', 'point', 'affiliate', 'gender',
        'date', 'user_create', 'avatar',
        'name'
    ];

    public function library() : BelongsTo
    {
        return $this->belongsTo(Library::class);
    }

    public function userCreate() : BelongsTo
    {
        return $this->belongsTo(User::class, 'user_create');
    }
}
