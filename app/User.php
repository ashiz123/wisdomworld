<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Post;
use App\TagUser;
use App\PostTags;
use App\Tag;
use Illuminate\Database\Eloquent\Relations\HasOneOrMany;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

        /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function followers():BelongsToMany
    {
        return $this->belongsToMany(User::class, 'followers', 'leader_id', 'follower_id')->withTimestamps();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function followings():BelongsToMany
    {
        return $this->belongsToMany(User::class, 'followers', 'follower_id', 'leader_id')->withTimestamps();
    }


    public function tagRelation():BelongsToMany
    {
       return $this->belongsToMany('App\Tag');
    }
   

    public function tag()
    {
        return $this->tagRelation();
    }

    public function userInfo()
    {
        return $this->hasOne('App\User\Userinfo');
    }

    public function postRelation():HasMany
    {
        return $this->hasMany(Post::class, 'user_id', 'id');
    }

    public function comment():HasMany
    {
        return $this->hasMany(Comment::class, 'user_id', 'id');
    }


    public function post()
    {
        return $this->postRelation();
    }

    public function education()
    {
        return $this->hasOne('App\Education');
    }

    public function taggedPosts()
    {
        return $this->hasManyThrough( Post::class, TagUser::class, 'tag_id', 'id' );
    }

   

  

    

    
} 
