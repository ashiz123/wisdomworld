<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Repositories\CommentInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\CommentRequest;

class CommentController extends Controller
{
   
    public function __construct(CommentInterface $comment)
    {
        $this->comment = $comment;
    }

    public function store(CommentRequest $request, $postId)
    {
         $this->comment->store($request, $postId);
         return response()->json([
             'status' => 'success',
             'message' => 'You comment on post',
             'redirectUrl' => url()->previous()
         ]);

    }
}
