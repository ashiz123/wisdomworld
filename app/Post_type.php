<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Post;

class Post_type extends Model
{
    const TABLE = "post_types";

    protected $table = self::TABLE;


    public function postRelation():HasMany
    {
        return $this->hasMany('App\Post', 'post_type_id', 'id');
    }

    public function posts()
    {
       return $this->postRelation();
    }

    public function postCount()
    {
        return $this->posts()->count();
    }


}
