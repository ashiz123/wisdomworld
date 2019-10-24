<?php

namespace App\Helpers;
use App\Post;
use Auth;
use App\User;

class Filter
{

   public static function homepage($request)
   {
        $posts = (new Post)->newQuery();
        $posts->where('title', 'LIKE', "%{$request}%")
        ->orWhere('description', 'LIKE', "%{$request}%");
         return $posts->get();
       
   }


}