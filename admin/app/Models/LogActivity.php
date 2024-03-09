<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LogActivity extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'action', 'model', 'admin', 'user'
    ];

    public function nguoi_dung() : BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
