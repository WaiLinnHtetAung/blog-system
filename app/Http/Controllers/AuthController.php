<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function create() {
        return view('auth.register');
    }

    public function store() {
        $formData = request()->validate([
            'name' => 'required|min:3',
            'username' => ['required', Rule::unique('users', 'username')],
            'email' => ['required','email', Rule::unique('users', 'email')],
            'password' => 'required',
        ]);

        $user = User::create($formData);

        auth()->login($user);

        return redirect('/')->with('status', 'Your registration is successful. Welcome '.$user->name);
    }

    public function logout() {
        auth()->logout();

        return redirect('/')->with('status', 'Good Bye');
    }

    public function login() {
        return view('auth.login');
    }

    public function post_login(Request $request) {
        $formData = $request->validate([
            'email' => ['required', 'email', Rule::exists('users', 'email')],
            'password' => ['required', 'min:8'],
        ], [
            'email.required' => 'Email is required to fill',
        ]);

        if(auth()->attempt($formData)) {
            return redirect('/')->with('status', 'Welcome Back '.auth()->user()->username);
        } else {
            return redirect()->back()->withErrors([
                'email' => 'Your credentials wrong',
            ]);
        }

        return $formData;
    }
}
