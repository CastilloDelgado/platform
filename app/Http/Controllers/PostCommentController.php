<?php

namespace App\Http\Controllers;

use App\Models\PostComment;
use Illuminate\Http\Request;
use App\Models\Post;

class PostCommentController extends Controller
{
    public function store(Post $post, Request $request)
    {
        $request->validate([
            'body' => 'required'
        ]);

        $post->comments()->create([
            'user_id' => $request->user()->id,
            'body' => $request->body,
        ]);

        return back();
    }

    public function delete(PostComment $postComment, Request $request){
        $post = $postComment->post;
        $postComment->delete();
        return redirect(route('posts.show', $post));
    }   
}
