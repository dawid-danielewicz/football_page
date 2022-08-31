<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\FunFact;
use Illuminate\Http\Request;

class FunFactController extends Controller
{
    public function __construct() {
        $this->middleware('auth')->except('index');
        $this->middleware('banned');
    }

    public function index() {
        $facts = FunFact::all();
        return view('facts.index', [
            'facts' => $facts
        ]);
    }

    public function create() {
        return view('facts.create');
    }

    public function store(Request $request) {
        $request->validate([
            'content' => 'required|string',
        ]);

        FunFact::create([
            'content' => $request->input('content'),
            'date' => $request->input('date')
        ]);

        return redirect(route('facts.index'));
    }

    public function edit($id) {
        $fact = FunFact::findOrFail($id);
        return view('facts.edit', [
            'fact' => $fact
        ]);
    }

    public function update(Request $request, $id) {
        $fact = FunFact::findOrFail($id);

        $request->validate([
            'content' => 'required|string'
        ]);

        $fact->content = $request->input('content');
        $fact->date = $request->input('date');
        $fact->save();

        return redirect(route('facts.index'));
    }

    public function destroy($id) {
        $fact = FunFact::findOrFail($id);
        $fact->delete();

        return redirect(route('facts.index'));
    }
}
