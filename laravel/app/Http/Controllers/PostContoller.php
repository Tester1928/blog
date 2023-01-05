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
        $arr_data = [
            [
                "title"   => "post 1",
                "content" => "tester content post 1",
            ],
            [
                "title"   => "post 2",
                "content" => "tester content post 2",
            ]
        ];

        foreach ($arr_data as $data){
            $result_add = Post::create($data);
        }

        dd($result_add);
    }

    public function update()
    {
        $post = Post::find(1);
        $result = $post->update([
            "title"   => "post 1 updated",
            "content" => "tester content post 1 updated",
        ]);
        dd($result);
    }
    public function delete()
    {
        $post = Post::find(1);
        //$result = $post->delete();
        $post = Post::withTrashed()->find(1);
        $result = $post->restore();

        dd($result);
    }
}
