<?php

namespace App\Repositories\Eloquent;
use App\Http\Traits\FileUploadTraits;
use App\Post;
use App\Repositories\PostInterface;
use Auth;
use App\User;
use DB;

class PostRepository implements PostInterface
{

    use FileUploadTraits;

    public $path = "post/";
  
    public function store($attributes)
    {
        DB::beginTransaction();

        try{
            $post = new Post;
            $post->user_id = Auth::user()->id;
            $post->title = $attributes['title'];
            $post->description = $attributes['description'];
            $post->image = $this->uploadImage( $attributes['image'], $this->path);
            $post->post_type_id = $attributes['post_type_id'];
            $post->links = $attributes['links'];
            $post->slug = $attributes['slug'];
            $post->refrence = $attributes['refrence'];
            $post->author = $attributes['author'];
            $post->publish = $attributes['publish'];
            if($post->save())
        {
            if($attributes['tags'] != null)
            {
                foreach($attributes['tags'] as $tag)
                {
                   $post->tags()->attach($tag);
                  
                }
               
            }
            DB::commit();
        }

        }
        catch(\Exception $e){
            DB::rollback();
        }
        
      
        

        

     }


    public function show($post)
    {
        $post= Post::where('id', $post)->with('user', 'postType','postComments')->firstOrFail();
        foreach($post->postComments as $postComment)
        {
            $user = User::where('id', $postComment->user_id)->first();
            $postComment['name'] = $user->name;
            $postComment['image'] = $user->userInfo->image;
        }

        return $post;
        
        
      
        
    }

}
