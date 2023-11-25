<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class Register extends Controller
{

    public function index(){
        return view('auth.register');
    }

    public function register(Request $request){

        $request->validate([
            'name' => ['required', 'max:16'],
            'email' => ['required','email'],
            'password' => ['required'],
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        return redirect("register")->with('success', "Registrasi berhasil!");
    }
}
