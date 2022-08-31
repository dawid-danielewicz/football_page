<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\MatchList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MatchListController extends Controller
{
    private $games = ['PL', 'FAC', 'LC', 'COM', 'CL', 'EL', 'COL', 'INT'];

    public function __construct() {
        $this->middleware('auth')->except('index');
        $this->middleware('banned');
    }

    public function index() {
        $matches = DB::table('match_lists')->orderBy('date')->get();
        return view('matches.index', [
            'matches' => $matches,
        ]);
    }

    public function create() {
        return view('matches.create', [
            'games' => $this->games
        ]);
    }

    public function store(Request $request) {
        $request->validate([
           'date' => 'required|date',
           'hour' => 'required',
           'game' => 'required|string',
           'home' => 'required|string',
           'away' => 'required|string'
        ]);

        MatchList::create([
            'date' => $request->input('date'),
            'hour' => $request->input('hour'),
            'game' => $request->input('game'),
            'home' => $request->input('home'),
            'away' => $request->input('away')
        ]);

        return redirect(route('matches.index'));
    }

    public function edit($id) {
        $match = MatchList::findOrFail($id);
        return view('.matches.edit', [
            'match' => $match,
            'games' => $this->games
        ]);
    }

    public function update(Request $request, $id) {
        $match = MatchList::findOrFail($id);

        $data = $request->validate([
            'date' => 'required|date',
            'hour' => 'required',
            'game' => 'required|string',
            'home' => 'required|string',
            'home_goals' => 'numeric',
            'away' => 'required|string',
            'away_goals' => 'numeric'
        ]);

        $match->date = $request->input('date');
        $match->hour = $request->input('hour');
        $match->game = $request->input('game');
        $match->home = $request->input('home');
        $match->home_goals = $request->input('home_goals');
        $match->away = $request->input('away');
        $match->away_goals = $request->input('away_goals');

        $match->save();

        return redirect(route('matches.index'));
    }

    public function destroy($id) {
        $match = MatchList::findOrFail($id);
        $match->delete();

        return redirect(route('matches.index'));
    }
}
