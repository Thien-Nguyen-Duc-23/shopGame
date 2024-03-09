<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BlogPost extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'library_id', 'cover_id', 'author_id', 'content', 'stt', 'hidden', 'blog_category_id'
    ];

    public function blog_category() : BelongsTo
    {
        return $this->belongsTo(BlogCategory::class);
    }

    public function library() : BelongsTo
    {
        return $this->belongsTo(Library::class);
    }

    public function author() : BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id', 'id');
    }

}
