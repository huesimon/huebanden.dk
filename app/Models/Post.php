<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function photos()
    {
        return $this->belongsToMany(Photo::class);
    }
    
    public function scopeIdDesc($query)
    {
        return $query->orderBy('id', 'DESC');
    }
    
    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function likedByUser(User $user)
    {
        //TODO:: Refactor to scope?
        if (!empty($user->likes->where("post_id", $this->id)->first())) {
            return true;
        }
        return false;
    }
}
