<?php

namespace App\Repositories\Eloquent;
use App\Repositories\LikeInterface;
use App\Like;

class LikeRepository implements LikeInterface
{
    public function store($attributes)
    {
       $likeable = new Like();
       $likeable->user_id = $attributes['user_id'];
       $likeable->post_id = $attributes['post_id'];
       $likeable->save();
    }

   

}