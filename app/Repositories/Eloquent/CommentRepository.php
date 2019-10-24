<?php

namespace App\Repositories\Eloquent;

use App\Repositories\CommentInterface;
use App\Post;
use App\Comment;
use Auth;

class CommentRepository implements CommentInterface
{

    // protected $user;

    protected $post;

    public function __construct(Post $post)
    {
        $this->post = $post;   
    }

    public function store($attributes, $postId)
    {
       $postComment = new Comment();
       $postComment->comment = $attributes['comment'];
       $postComment->post_id = $postId;
       $postComment->user_id = Auth::user()->id;
       $postComment->save();

       return $postComment;
    }

}
