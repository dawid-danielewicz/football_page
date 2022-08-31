<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct() {
        $this->middleware('banned')->except('ban');
    }

    public function edit($id) {
        $user = User::findOrFail($id);
        return view('users.edit', [
            'user' => $user
        ]);
    }

    public function update(Request $request, $id) {
        $request->validate([
            'name' => 'required|string',
            'password' => 'min:8'
        ]);

        if($request->input('password') != $request->input('confirm')) {
            return redirect()->back()->with('confirmation', 'Passwords are not equal!');
        }

        $user = User::findOrFail($id);
        $user->name = $request->input('name');
        if($request->input('password') != null) {
            $user->password = bcrypt($request->input('password'));
        }
        $user->save();

        return redirect(route('users.edit', ['id' => $user->id]));
    }

    public function ban() {
        return view('users.banned');
    }
}
