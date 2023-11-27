<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
class Main extends Controller
{
    public function dashboard(){
        $userData = Auth::user();
        $post = $userData->posts()->latest()->paginate(5);
        return view("dashboard", ['user' => $userData, 'posts' => $post]);
    }
}
