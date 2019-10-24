<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\TagRequest;
use App\Repositories\TagInterface;
use Auth;
use App\Tag;
use App\PostTags;
use App\TagUser;
use App\User;
use DB;
use App\Post;
use Illuminate\Support\Collection;
use Illuminate\Validation\Rules\Exists;

class TagController extends Controller
{
    public function __construct(TagInterface $taggable)
    {
        $this->middleware('auth');

       $this->taggable = $taggable;
    }

    public function index($name)  //bug here.
    {
     
        $userTags = TagUser::where('user_id', Auth::user()->id)->get();
        
        $unTagged = DB::table('tags')
            ->when($userTags, function ($query, $userTags) {
                foreach($userTags as $userTag)
                {
                    $query->where('id', '!=' , $userTag->tag_id);
                }
                return $query;
                
            })
            ->get();
       
            return view('User.pages.tag.view', [
            'userTags' => $userTags,
            'unTagged' => $unTagged
        ]);
    }

    public function show()
    {
        $tagged = [];
        $tags = Auth::user()->tag;
        foreach($tags as $tag)
        {
            array_push($tagged, $tag->id);
        }
        $posts = Post::join('post_tag', 'posts.id', '=', 'post_tag.post_id')
        ->whereIn('post_tag.tag_id', $tagged)->latest()->get()->unique('post_id');
        
        return view('User.pages.tag.show',[
             'tags' => $tags,
              'posts' => $posts
         ]);
    }

    public function store($id)
    {

        $this->taggable->store($id);
        return response()->json([
            'status' => 'success',
            'message' => 'You have tagged',
            'redirectUrl' => url()->previous()
        ]);

    }

    public function showById($id)
    {
    
        $posts = Tag::find($id)->post;
        return view('User.pages.tag.showById', [
            'posts' => $posts
        ]);
    }

    public function remove($id)
    {

        $this->taggable->remove($id);
        return response()->json([
            'status' => 'success',
            'message' => 'You have untagged',
            'redirectUrl' => url()->previous()
        ]);

    }


 
}
