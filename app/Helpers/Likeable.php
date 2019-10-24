<?php

namespace App\Helpers;
use App\Like;
use Auth;




Class Likeable 
{

    public static function likeable($request)  
    {
         $likePosts = Like::where('post_id', $request['post_id'])->get();
         if(count($likePosts) > 0)
         {
            foreach($likePosts as $likePost)
        {
            if($likePost['user_id'] == Auth::user()->id)
            {
                return true;
            }
            
        }
         }
         return false;
    }


}