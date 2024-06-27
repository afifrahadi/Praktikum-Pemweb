<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register.index');
    }

    public function store(Request $request)
    {
        $validated_data = $request->validate([
            'name'=>'required|max:255',
            'username'=>'required|min:3|max:255|unique:users',
            'email'=>'required|email:dns|unique:users',
            'password'=>'required'
        ]);

        $validated_data['password'] = bcrypt($validated_data['password']);

        User::create($validated_data);
        return redirect('/login')->with('success', 'Registration success, Please Login!');
    }
}
