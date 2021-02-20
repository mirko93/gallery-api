<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Resources\PostCollection;

class AppController extends Controller
{
    public function index()
    {
        $posts = Post::all();

        return view('home', compact('posts'));
    }
}
