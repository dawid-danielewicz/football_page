<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\CurrentSeason;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CurrentSeasonController extends Controller
{
    public function __construct() {
        $this->middleware('auth')->except('index');
        $this->middleware('banned');
    }

    public function index() {
        $teams = DB::table('current_seasons')->orderBy('points', 'desc')->orderBy('goals', 'desc')->get();
        return view('table.index', [
            'teams' => $teams
        ]);
    }

    public function create() {
        return view('table.create');
    }

    public function store(Request $request) {
        $data = $request->validate([
            'team' => 'required|string|unique:current_seasons'
        ]);

        CurrentSeason::create($data);

        return redirect(route('table.index'));
    }

    public function edit($id) {
        $team = CurrentSeason::findOrFail($id);
        return view('table.edit', [
            'team' => $team
        ]);
    }

    public function update(Request $request, $id) {
        $team = CurrentSeason::findOrFail($id);

        $request->validate([
           'team' => 'required|string',
           'goals' => 'integer',
           'wins' => 'integer',
           'draws' => 'integer',
           'loses' => 'integer'
        ]);

        $team->team = $request->input('team');
        $team->goals = $request->input('goals');
        $team->wins = $request->input('wins');
        $team->draws = $request->input('draws');
        $team->loses = $request->input('loses');

        $team->matches = $team->wins + $team->draws + $team->loses;
        $team->points = $team->wins * 3 + $team->draws * 1;

        $team->save();

        return redirect(route('table.index'));
    }

    public function destroy($id) {
        $team = CurrentSeason::findOrFail($id);
        $team->delete();

        return redirect(route('table.index'));
    }
}
