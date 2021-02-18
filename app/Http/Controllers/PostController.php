<?php

namespace App\Http\Controllers;

use App\Http\Resources\Post as ResourcesPost;
use App\Http\Resources\PostCollection;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return new PostCollection(Post::all());
    }

    public function store()
    {
        $data = request()->validate([
            'data.attributes.title' => '',
        ]);

        $post = request()->user()->posts()->create($data['data']['attributes']);

        return new ResourcesPost($post);
    }
}
