<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogPostTab extends Model
{
    use HasFactory;

    protected $fillable = [
        'blog_post_id', 'blog_tab_id'
    ];


}
