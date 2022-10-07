<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(user::class, 'user_id', 'id');
    }

    public function post()
    {
        return $this->belongsTo(Post::class, 'user_id', 'id');
    }
}
