<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;


class UserController extends Controller
{
    public function index()
    {
        return view('User.index', [
            'users' => User::all()
        ]);
    }

    public function show(User $user)
    {
        return view('User.index', [
            'users' => User::find($user->id)->get()
        ]);
    }

    public function create()
    {
        return view('User.createForm', [
            'roles' => Role::where('name', '<>', 'Super-Admin')->get(),
        ]);
    }

    public function store()
    {
        $attributes = request()->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required|min:8'
        ]);

        $attributes['password'] = Hash::make($attributes['password']);

        $user = User::create($attributes);

        $role = request()->role;
        $user->assignRole($role);

        auth()->login($user);

        return redirect('/users');
    }

    public function edit(User $user)
    {
        return view('User.updateForm', [
            'user' => $user,
            'roles' => Role::where('name', '<>', 'Super-Admin')->get(),
        ]);
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect('/users');
    }
}
