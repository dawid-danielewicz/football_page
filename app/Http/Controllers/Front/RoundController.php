<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Round;
use Illuminate\Http\Request;

class RoundController extends Controller
{
    public function __construct() {
        $this->middleware('auth')->except('index');
        $this->middleware('banned');
    }

    public function index() {
        $round = Round::all();
        return view('rounds.index', [
            'round' => $round
        ]);
    }

    public function create() {
        return view('rounds.create');
    }

    public function store(Request $request) {
        $data = $request->validate([
            'round_number' => 'required',
            'home_team' => 'required|string',
            'home_goals' => 'required',
            'away_team' => 'required|string',
            'away_goals' => 'required'
        ]);

        Round::create($data);

        return redirect(route('rounds.index'));
    }

    public function edit($id) {
        $round = Round::findOrFail($id);
        return view('rounds.edit', [
           'round' => $round
        ]);
    }

    public function update(Request $request, $id) {
        $round = Round::findOrFail($id);

        $request->validate([
            'round_number' => 'required',
            'home_team' => 'required|string',
            'home_goals' => 'required',
            'away_team' => 'required|string',
            'away_goals' => 'required'
        ]);

        $round->round_number = $request->input('round_number');
        $round->home_team = $request->input('home_team');
        $round->home_goals = $request->input('home_goals');
        $round->away_team = $request->input('away_team');
        $round->away_goals = $request->input('away_goals');

        $round->save();

        return redirect(route('rounds.index'));
    }

    public function destroy($id) {
        $round = Round::findOrFail($id);
        $round->delete();

        return redirect(route('rounds.index'));
    }
}
