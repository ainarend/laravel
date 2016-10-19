<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        return view('user.profile', ['user' => $user]);
    }

    public function settings() {
        $user = Auth::user();
        return view('user.settings', ['name' => $user->name, 'email' => $user->email]);
    }

    public function updateSettings(Request $request) {

        $this->validate($request, [
            'name' => 'required|min:3|max:255',
            'email' => 'required|email',
        ]);

        $user = User::find(Auth::user()->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();
        return view('user.settings', ['name' => $user->name, 'email' => $user->email, 'msg' => 'Succesfully updated']);
    }
}
