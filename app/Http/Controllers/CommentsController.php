<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Comment;
use App\Post;

class CommentsController extends Controller
{
    public function store(Post $post, Request $request)
    {
        $post->createComment($request->all());

        return redirect()->back()->with('message', "コメントが送信されました");
    }
}
