<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReferPartner extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'rate', 'token', 'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_ids');
    }
}
