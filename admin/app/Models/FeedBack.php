<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeedBack extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id', 'library_id', 'content', 'admin_note', 'stars', 'status'
    ];

    public function library()
    {
        return $this->belongsTo(Library::class, 'library_id');
    }

    public function order()
    {
        return $this->belongsTo(Order::class, 'library_id');
    }

    public function getImageFeedbackAttribute()
    {
        return $this->library && $this->library->link ? asset($this->library->link) : null;
    }
}
