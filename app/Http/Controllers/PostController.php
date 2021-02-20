<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Resources\PostCollection;
use App\Http\Resources\Post as ResourcePost;

class PostController extends Controller
{
    public function index()
    {
        return new PostCollection(request()->user()->posts);
    }

    public function store()
    {
        $data = request()->validate([
            'data.attributes.title' => '',
        ]);

        $post = request()->user()->posts()->create($data['data']['attributes']);

        return new ResourcePost($post);
    }
}
