<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
        $this->middleware('banned');
    }

    public function store(Request $request) {
        $request->validate([
            'content' => 'string'
        ]);

        Comment::create([
           'content' => $request->input('content'),
           'user_id' => Auth::user()->id,
           'article_id' => $request->input('article_id')
        ]);

        return redirect(route('articles.show', ['id' => $request->input('article_id')]));
    }
}
