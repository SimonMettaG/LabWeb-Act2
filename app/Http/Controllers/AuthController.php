<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(Request $req) {
        return view('auth.register');
    }

    public function doRegister(Request $req) {
        $data = $req->all();

        Validator::make($req->all(), [
            'name' => 'required',
            'email' => 'required|email:rfc,dns',
            'password' => 'required|confirmed',
            'role' => 'required'
        ])->validate();

        $data['password'] = Hash::make($data['password']);

        User::create($data);
        return redirect()->back();
    }

    public function login(Request $req) {
        return view('auth.login');
    }

    public function doLogin(Request $req) {
        $credentials = $req->only('email', 'password');

        if(Auth::attempt($credentials)) {
            return redirect()->route('coins.index');
        }
        return redirect()->back();
    }

    public function logout(Request $req) {
        Auth::logout();
        $req->session()->invalidate();
        $req->session()->regenerateToken();
        return redirect()->route('coins.index');
    }

    public function showUsers(Request $req) {
        $users = User::all();
        return view('users.index', ['users' => $users]);
    }

    public function deleteUser(Request $req, User $user) {
        $user->delete();
        return redirect()->route('users.index');
    }
}
