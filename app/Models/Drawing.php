<?php

namespace App\Models;

use App\Models\Comment;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Drawing extends Model
{
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
    use HasFactory;
}