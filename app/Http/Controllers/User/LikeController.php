<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\LikeInterface;
use App\Http\Requests\User\LikeRequest;
use App\Like;
use App\Post;
use Auth;
use App\Helpers\Likeable;
class LikeController extends Controller
{
    public function __construct(LikeInterface $likeable)
    {
        $this->likeable = $likeable;
    }

    public function store(LikeRequest $request)
    {
        
       
        if(Likeable::likeable($request) == false){
            
            $this->likeable->store($request);
            $post = Post::where('id', $request->post_id)->first();
           
            // $html  = view('User.pages.post.like', ['post' => $post])->render();
            $likeCount = $post->likeCount();

            return response()->json([
                'status' => 'success',
                'code' => 200,
                'message' => 'OK',
                'likeCount' => $likeCount
          ]);
        }

        return response()->json([
            'status' => 'success',
            'code' => 200,
            'likeCount' => 'null'
      ]);
        

    }


 
}
