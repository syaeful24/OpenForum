<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function create(Request $request){
        Post::create([
            "user_id" => Auth::user()->id,
            "title"=> $request->title,
            "content"=> $request->content,
        ]);
    }
}
