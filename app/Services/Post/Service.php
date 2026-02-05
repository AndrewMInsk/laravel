<?php

namespace App\Services\Post;

use App\Http\Requests\SomeRequest;
use App\Models\Post;

class Service
{
    public function index(){
        return Post::all();

    }
    public function store($data){
        if(!isset($data['tags'])){
            $data['tags'] = [];
        }
        $tags = $data['tags'];
        unset($data['tags']); // тэги нам в дате не нужны

        $post = Post::updateOrCreate(['title' => $data['title']], $data);
//        foreach ($tags as $tag) {
//            PostTag::firstOrCreate([
//                'post_id' => $post->id,
//                'tag_id' => $tag,
//            ]);
//        }
        $post->tags()->attach($tags); // добавляет тэги. Может быть тут лучше sync? да, так работает тоже
        return $post;
    }
}
