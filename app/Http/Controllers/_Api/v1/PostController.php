<?php

namespace App\Http\Controllers\_Api\v1;
use Illuminate\Http\Request; 
use App\Http\Controllers\Controller; 
use App\Http\Resources\PostResource;
use App\User; 
use Illuminate\Support\Facades\Auth; 
use Validator;
use App\Post;



class PostController extends Controller 
{
    public function getAllPosts()
    {
        return new PostResource(Post::latest()->get());  //to get the latest posts
    }

    public function postByUser($userId)
    {
       return new PostResource(Post::where('user_id', $userId)->latest()->get());
    }
} 