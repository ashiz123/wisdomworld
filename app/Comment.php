<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
// use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    public function post():BelongsToMany
    {
        return $this->belongsToMany('App/Post', 'post_id', 'id');
    }

    public function userRelation():BelongsToMany
    {
        return $this->BelongsToMany('App\User', 'user_id', 'id');
    }

    public function user()
    {
        return $this->userRelation();
    }
}
