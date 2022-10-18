<?php

namespace App\Http\Controllers;

use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function index()
    {
        return view('Login.loginForm');
    }

    public function show()
    {

    }

    public function create()
    {
        $credentials = request()->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if (!auth()->attempt($credentials)) {
            throw ValidationException::withMessages([
                'email' => 'Your provided credentials could not be verified'
            ]);
        }

        return redirect('/users');
    }

    public function edit()
    {

    }

    public function destroy()
    {
        auth()->logout();

        return redirect('/login');
    }
}
