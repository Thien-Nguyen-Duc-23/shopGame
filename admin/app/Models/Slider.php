<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Slider extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'library_id',
        'url',
        'status',
        'sort_number',
        'is_preview',
        'position'
    ];

    public function library() : BelongsTo
    {
        return $this->belongsTo(Library::class);
    }
}
