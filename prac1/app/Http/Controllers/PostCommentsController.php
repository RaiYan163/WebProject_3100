<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostCommentsController extends Controller
{
    //
    public function store(Post $post)
    {
        request()->validate([
            'body' =>'required'
        ]);
         $post->comments()->create([
            'user_id' => request()->user()->id,
             'body' => request('body')
         ]);

        //dd($post);

         return back();
    }

    public function destroy(Post $post, Comment $comment)
    {
        $comment->delete();

        return redirect()->to('/posts/' . $post->slug)->with('success', 'Comment deleted!');

    }
}
