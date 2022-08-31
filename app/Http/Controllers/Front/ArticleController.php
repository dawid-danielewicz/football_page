<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ArticleController extends Controller
{
    private $slots = ['none', 'main', 'first slot', 'second slot'];

    public function __construct() {
        $this->middleware('auth')->only(['create', 'store', 'edit', 'update', 'destroy']);
        $this->middleware('banned');
    }

    public function index() {
        $articles = Article::paginate(12);
        return view('articles.index', [
            'articles' => $articles
        ]);
    }

    public function show($id) {
        $article = Article::findOrFail($id);
        $comments = $article->comments()->orderBy('created_at', 'desc')->get();
        return view('articles.show', [
            'article' => $article,
            'comments' => $comments,
        ]);
    }

    public function create() {
        return view('articles.create', [
            'slots' => $this->slots
        ]);
    }

    public function store(Request $request) {
        $data = $request->validate([
           'title' => 'required|string',
           'slug' => 'required|string',
           'excerpt' => 'required|string',
           'content' => 'required|string',
           'user_id' => 'required'
        ]);

        $article = Article::create([
            'title' => $request->input('title'),
            'slug' => $request->input('slug'),
            'excerpt' => $request->input('excerpt'),
            'content' => $request->input('content'),
            'user_id' => Auth::user()->id
        ]);

        if($request->input('slot') != 'none') {
            $option = DB::table('options')->where('name', '=', $request->input('slot'))->first();
            if($option === null) {
                DB::table('options')->insert(['name'=> $request->input('slot'), 'value' => $article->id ]);
            } else {
                DB::table('options')->where('name', '=', $request->input('slot'))->update(['value' => $article->id]);
            }
        }

        return redirect(route('articles.index'));
    }

    public function edit(Article $article) {
        $current_slot = DB::table('options')->where('value', '=', $article->id)->first();
        return view('articles.edit', [
            'article' => $article,
            'slots' => $this->slots,
            'current_slot' => $current_slot
        ]);
    }

    public function update(Request $request, $id) {
        $article = Article::findOrFail($id);

        $data = $request->validate([
            'title' => 'required|string',
            'slug' => 'required|string',
            'excerpt' => 'required|string',
            'content' => 'required|string',
            'user_id' => 'required'
        ]);

        $article->title = $request->input('title');
        $article->slug = $request->input('slug');
        $article->excerpt = $request->input('excerpt');
        $article->content = $request->input('content');
        $article->user_id = $request->input('user_id');

        $article->save();

        if($request->input('slot') != 'none') {
            $option = DB::table('options')->where('name', '=', $request->input('slot'))->first();
            if($option === null) {
                DB::table('options')->insert(['name'=> $request->input('slot'), 'value' => $article->id ]);
            } else {
                DB::table('options')->where('name', '=', $request->input('slot'))->update(['value' => $article->id]);
            }
        }

        return redirect(route('articles.index'));
    }

    public function destroy($id) {
        $article = Article::findOrFail($id);
        $article->delete();

        return redirect(route('articles.index'));
    }
}
