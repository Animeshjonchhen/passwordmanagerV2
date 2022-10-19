<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Password;
use Illuminate\Support\Facades\Crypt;

class PasswordController extends Controller
{
    public function index()
    {
        if (auth()->user()) {
            if (auth()->user()->hasRole('Super-Admin')) {
                return view('Password.index', [
                    'passwords' => Password::all(),
                ]);
            } else {
                return view('Password.index', [
                    'passwords' => Password::where('user_id', auth()->user()->id)->get(),
                ]);
            }
        } else {
            return view('Login.loginForm');
        }
    }

    public function show(Password $password)
    {
        return view('Password.showPassword', [
            'password' => Password::find($password->id),
        ]);
    }

    public function create()
    {
        return view('Password.create', [
            'categories' => Category::all(),
        ]);
    }

    public function store()
    {
        $attributes = request()->validate([
            'email' => 'required',
            'password' => 'required',
            'category_id' => 'required',
        ]);

        $attributes['url'] = request()->url;

        $attributes['remarks'] = request()->remarks;

        $attributes['password'] = Crypt::encryptString($attributes['password']);

        $attributes['user_id'] = auth()->user()->id;

        Password::create($attributes);

        return redirect('/passwords');
    }

    public function edit(Password $password)
    {
        return view('Password.updateForm', [
            'password' => Password::find($password->id),
            'categories' => Category::all(),
        ]);
    }

    public function update(Password $password)
    {
        $attributes = request()->validate([
            'email' => 'required',
            'password' => 'required',
            'category_id' => 'required',
        ]);

        $attributes['url'] = request()->url;

        $attributes['remarks'] = request()->remarks;

        $attributes['password'] = Crypt::encryptString($attributes['password']);

        $attributes['user_id'] = auth()->user()->id;

        $password->update($attributes);

        return redirect('/passwords');
    }

    public function destroy(Password $password)
    {
        $password->delete();

        return redirect('/passwords');
    }
}
