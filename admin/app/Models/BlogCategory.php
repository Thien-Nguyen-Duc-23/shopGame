<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class BlogCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'library_id', 'description', 'stt', 'hidden'
    ];

    public function library() : BelongsTo
    {
        return $this->belongsTo(Library::class);
    }

    public function blog_posts() : HasMany
    {
        return $this->hasMany(BlogPost::class);
    }

}
