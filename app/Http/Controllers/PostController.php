<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
public function index(){
    $posts = Post::where([['is_published','=', 1]])->get();

    foreach($posts->all() as $post){

        dump($post->content);

    }

}
    public function create(){
        $postsArr = [[
            'title' => 'ti1tylewew we',
            'content'=> '1tsdfest',
            'image'=> 'tsd1fest',
            'likes'=> 5,
            'is_published'=>  1,
        ],
            [
                'title' => 'ti2tylewew we',
                'content'=> 'ts2dfest',
                'image'=> 'tsdf2est',
                'likes'=> 32,
                'is_published'=> 0,
            ]
        ];
        Post::create([
            'title' => '777ti2tylewew we',
            'content'=> '777ts2dfest',
            'image'=> 'tsdf2est',
            'likes'=> 32,
            'is_published'=> 0,
        ]);
    }
    public function update(){
        $post = Post::where([['id','=', 1]])->get();
        $post->first()->update([
            'title' => 'updat22e',

        ]);
    }
    public function delete(){
        $post = Post::withTrashed()->where([['id','=', 2]])->first(); // поиск в мусорке //добавить use SoftDeletes и в миграцию             $table->softDeletes();

        dump($post->restore());


    }
}
