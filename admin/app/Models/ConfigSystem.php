<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConfigSystem extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'type', 'setting', 'value', 'content'
    ];

}
