<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AuthController extends Controller
{
    public function create()
    {
        return view('auth.blogs.register');
    }

    public function store()
    {
        $formData = request()->validate([
            'name' => ['required', 'min:3'],
            'username' => ['required', 'min:3', Rule::unique('users', 'username')],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'min:8'],
        ]);
        $user = User::create($formData);
        auth()->login($user);
        return redirect('/')->with('success', 'Welcome to ' . $user->name);
    }

    public function login()
    {
        return view('auth.blogs.login');
    }

    public function login_user()
    {
        $formData = request()->validate([
            'email' => ['required', 'min:3', 'max:255', Rule::exists('users', 'email')],
            'password' => ['required', 'min:3', 'max:255'],
        ]);
        if (auth()->attempt($formData)) {
            return redirect('/')->with('success','Welcome Back');
        } else {
            return back()->withErrors([
                'login_fail' => 'Username and Password Wrong!'
            ]);
        }
    }

    public function logout()
    {
        auth()->logout();
        return redirect('/')->with('success', 'Good Bye');
    }
}
