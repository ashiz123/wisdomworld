<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use App\Repositories\PostInterface;
use App\Post_type;
use Illuminate\Support\Facades\DB;
use App\Followers;
use Auth;
use App\TagUser;
use App\PostTags;
use App\Tag;
use Illuminate\Support\Collection;

class WelcomeController extends Controller
{

  private $repo;

  public function __construct(PostInterface $repo)
  {
    $this->repo = $repo;
  }


    public function home()
    {
       
        $latestPost = Post::latest()->paginate(4); //Need to make popular post
      
        if(Auth::check())
        {
         
          $followings = Followers::where('follower_id', Auth::id())->get();
          if($followings->count() > 0)
          {
            foreach($followings as $following)
            {
              $following_leader[] = $following->leader_id;
            }
           $latestPost = Post::whereIn('user_id', $following_leader)
           ->orWhere('user_id', Auth::id())
           ->latest()->paginate(4);
            
          }
         }

         $types=Post_type::all();
        foreach($types as $type){
        //  dd($type->postCount());
          switch($type->id)
            {
              case '1':
              $posts[$type->id]=Post::where('post_type_id',$type->id)->where('publish','1')->limit(1)->get();
              break;

              case '2':
              $posts[$type->id] = Post::where('post_type_id', $type->id)->where('publish', '1')->limit(3)->get();
              break;

              case '3':
              $posts[$type->id] = Post::where('post_type_id', $type->id)->where('publish', '1')->limit(1)->get();
              break;

              default:
              $posts[$type->id] = Post::where('post_type_id', $type->id)->where('publish', '1')->limit(3)->get();
              break;

            }

        // $posts[$type->id]=Post::where('post_type_id',$type->id)->where('publish','1')->limit(3)->get();
        }

     
       
      return view('welcome', [
        'types' => $types,
        'posts' => $posts,
        'latestPosts' => $latestPost
        ]);
    }
}
