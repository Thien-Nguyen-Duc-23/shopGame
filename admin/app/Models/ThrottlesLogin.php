<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ThrottlesLogin extends Model
{
    use HasFactory;

    protected $fillable = [
        'email', 'ip', 'times', 'block'
    ];

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }


}
