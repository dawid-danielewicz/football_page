<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Player;
use Illuminate\Http\Request;

class PlayerController extends Controller
{
    private $positions = ['goal keeper', 'defender', 'midfielder', 'striker'];

    public function __construct() {
        $this->middleware('auth')->except(['index', 'show']);
        $this->middleware('banned');
    }

    public function index() {
        $players = Player::all();
        return view('players.index',[
            'players' => $players
        ]);
    }

    public function show(Player $player) {
        return view('players.show', [
            'player' => $player
        ]);
    }

    public function create() {
        return view('players.create',[
            'positions' => $this->positions
        ]);
    }

    public function store(Request $request) {
        $data = $request->validate([
           'name' => 'required|max:255',
           'surname' => 'required|max:255',
           'nationality' => 'required|max:255',
           'number' => 'required',
           'story' => 'required|string',
           'height' => 'required|integer',
           'weight' => 'required|integer',
           'position' => 'required|string',
           'is_injured' => 'bool',
           'born' => 'required|date',
           'contract' => 'required|date'
        ]);

         Player::create($data);

         return redirect('/players');
    }

    public function edit(Player $player) {
        return view('players.edit', [
            'player' => $player,
            'positions' => $this->positions
        ]);
    }

    public function update(Request $request, $id) {
        $player = Player::findOrFail($id);

        $data = $request->validate([
            'name' => 'required|max:255',
            'surname' => 'required|max:255',
            'nationality' => 'required|max:255',
            'number' => 'required',
            'story' => 'required|string',
            'height' => 'required|integer',
            'weight' => 'required|integer',
            'position' => 'required|string',
            'is_injured' => 'bool',
            'born' => 'required|date',
            'contract' => 'required|date'
        ]);

        $player->name = $request->input('name');
        $player->surname = $request->input('surname');
        $player->nationality = $request->input('nationality');
        $player->number = $request->input('number');
        $player->story = $request->input('story');
        $player->height = $request->input('height');
        $player->weight = $request->input('weight');
        $player->position = $request->input('position');
        $player->is_injured = $request->input('is_injured');
        $player->born = $request->input('born');
        $player->contract = $request->input('contract');

        $player->save();

        return redirect(route('players.index'));
    }

    public function destroy($id) {
        $player = Player::findOrFail($id);
        $player->delete();

        return redirect(route('players.index'));
    }

}
