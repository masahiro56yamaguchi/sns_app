<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class CommentsController extends Controller
{
    public function index($id)
    {
        $share = Post::find($id);

        $comments = Comment::orderBy('updated_at', 'DESC')->get();

        return view('pages/comments/index', compact('share','comments'));
    }

    public function store(Request $request)
    {
        $comment_text = $request->comment;
        $post_id = $request->postId;

        $comments = new Comment();
        
        $comments->fill([
            'user_id' => Auth::user()->id,
            'post_id' => $post_id,
            'comment' => $comment_text
        ])->save();

        return redirect()->route('comments');
    }
}
