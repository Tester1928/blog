<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostContoller extends Controller
{
    public function index()
    {

        $posts = Post::all();

        dd($posts);
    }

    public function create()
    {
        $result_add = Post::create([
            "title"   => "tester",
            "content" => "tester content",
        ]);
        dd($result_add);
    }
}
