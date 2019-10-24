<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\PostInterface;
use App\Http\Requests\User\PostRequest;
use App\Post_type;
use App\Post;
use App\Helpers\Likeable;
use App\Tag;
use App\PostTags;

class PostController extends Controller
{
    private $repo;

    public function __construct(PostInterface $repo)
    {
     $this->repo =  $repo;  
     $this->middleware('auth');
    }

    public function create()
    {
       $postTypes = Post_type::all();
       $tags = Tag::all();
    
     
       return view('User.pages.post.add',[
           'postTypes' => $postTypes,
           'tags' => $tags
       ]);
    }

    public function store(PostRequest $request)
    {
       
        
        // $tags = explode(',', $request->tag);
      
       $this->repo->store($request);
       return response()->json([
        'status' => 'success',
        'message' => 'Post created successfully',
        'redirectUrl' => route('welcome')
    ]);
    }

    public function show($id)
    {
        
        $post =  $this->repo->show($id);
        return view('User.pages.post.show',[
            'post' => $post
        ]);
        
    }

 

    
}
