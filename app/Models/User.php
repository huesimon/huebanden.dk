<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Post;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function createPost(Post $post)
    {
        return $this->posts()->save($post);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function createComment(Comment $comment)
    {
        return $this->comments()->save($comment);
    }

    public function photos()
    {
        return $this->hasMany(Photo::class);
    }

    public function createPhoto(Photo $photo)
    {
        return $this->posts()->save($photo);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    /**
     * Create a like for a post.
     * Only create a like if the user hasn't liked the post before.
     * TODO:: Make this better
     * @param Like $newLike
     *
     * @return bool||Like
     */
    public function createLike(Like $newLike)
    {
        $foundLike = $this->hasLike($newLike);
        if ($foundLike) {
            return false;
        }
        return $this->likes()->save($newLike);
    }

    public function hasLike(Like $findableLike)
    {
        foreach ($this->likes as $like) {
            if ($like->post == $findableLike->post) {
                return $findableLike;
            }
        }
        return false;
    }

    public function hasLikedPost(Post $post)
    {
        foreach ($this->likes as $like) {
            if ($like->post->id == $post->id) {
                return $post;
            }
        }
        return false;
    }
}
