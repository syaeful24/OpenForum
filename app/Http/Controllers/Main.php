<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Main extends Controller
{
    public function dashboard(){
        $userData = Auth::user();
        return view("dashboard", ['user' => $userData]);
    }
}
