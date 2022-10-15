<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'sub_title', 'paragraph', 'image_path', 'image_description', 'user_id'];

    public function user()
    {
        return $this->belongsTo(user::class, 'user_id', 'id');
    }

    public function comments() 
    {
        return $this->hasMany(Comment::class, 'post_id', 'id');
    }

    public function likes() 
    {
        return $this->hasMany(Like::class, 'post_id', 'id');
    }
}
