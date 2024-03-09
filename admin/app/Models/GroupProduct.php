<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class GroupProduct extends Model
{
    use HasFactory;
    protected $fillable = [
        'library_id', 'name', 'description'
    ];

    public function library() : BelongsTo
    {
        return $this->belongsTo(Library::class);
    }

    public function products() : HasMany
    {
        return $this->hasMany(Product::class);
    }
}
