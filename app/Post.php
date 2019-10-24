<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\User;
use App\Like;
use Auth;
use App\Tag;

use App\Helpers\Following;


class Post extends Model
{
 

    public function userRelation():BelongsTo
    {
       return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function postTypeRelation()
    {
        return $this->belongsTo('App\Post_type', 'post_type_id', 'id');
    }


    public function postType()
    {
        return $this->postTypeRelation();
    }

    public function user()
    {
        return $this->userRelation();
    }


    public function toMonthName()
    {
       return $this->created_at->format('M-d');
    }

    public function checkFollow()
    {
        return Following::follow($this->user->id);
    }

    public function postComments():HasMany
    {
        return $this->hasMany('App\Comment', 'post_id', 'id');
    }

    public function likeCount()
    {
        $like = Like::where('post_id', $this->id)->get();
        return $like->count();
    }


    
    public function authLike()
    {
        $postLikes = Like::where('post_id', $this->id)->get();
        foreach($postLikes as $postLike)
        {
            if($postLike->user_id == Auth::user()->id)
            {
                return true;
            }
        }
        return false;

    }




    public function tagRelation():BelongsToMany
    {
       return $this->belongsToMany('App\Tag');
    }


    public function tags()
    {
        return $this->tagRelation();
    }


  



    // public function PostTags()
    // {
    //    return $this->morphToMany('App\PostTags', 'post_id', 'id');
    // }

  


    // public function format()
    // {
    //     return [
    //         'title' => $this->title,
    //         'description' => $this->description,
    //         'slug' => $this->slug,
    //         'tag' => $this->tag,
    //         'image' => $this->image,
    //         'post type' => $this->postType->title,
    //         'refrence' => $this->refrence,
    //         'author' => $this->author,
    //         'link' => $this->link,
    //         'vote' => $this->vote,
    //         'publish' => $this->publish,
    //         'created' => $this->created_at->diffForHumans()

    //     ];
    // }

    // public function user()
    // {
    //     return User::where('');
    // }

    
    
    
}
