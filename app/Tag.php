<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\PostTags;
use Illuminate\Support\Collection;
use App\Post;

class Tag extends Model
{

    const TABLE = "tags";

    protected $table = self::TABLE;
    
    protected $fillable = [
        'tag'
    ];

    public function postRelation(): BelongsToMany
    {
        return $this->belongsToMany(Post::class);
    }


    public function post()
    {
        return $this->postRelation();
    }



    public function postTest()
    {
        dd($this->postRelation);
    }

    public function userRelation(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }


    public function user()
    {
        return $this->userRelation();
    }

    public function tagName()
    {
        return $this->tag;
    }

    public function taggedPosts()
    {
        return $this->hasManyThrough( PostTags::class, User::class, 'id', 'tag_id' );
    }


    // public function userRelation():BelongsToMany
    // {
    //     return $this->belongsToMany(User::class);
    // }

    // public function user()
    // {
    //     return $this->userRelation();
    // }

    // public function user(): BelongsToMany
    // {
    //     return $this->belongsToMany(User::class, 'user_id', 'tag_id');
    // }


    
   
}
                 