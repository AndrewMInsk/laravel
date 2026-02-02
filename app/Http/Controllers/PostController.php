<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use JetBrains\PhpStorm\NoReturn;

class PostController extends Controller
{
    public function index()
    {
        $post = Post::find(61);
        $category = Category::find(1);
        $tag = Tag::find(1);
        $posts = $category->posts;

        return view('post/index', compact('posts'));
    }

    public function create()
    {
        return view('post/create');
    }

    #[NoReturn] public function store(Request $request)
    { // тут я сделал неверно, по конвенции нужно отдельный метод

        $data = $request->validate(['title' => 'required', 'content' => 'required', 'image' => '', 'id' => '']);
        Post::updateOrCreate(['id' => $data['id']], $data);
        return redirect()->route('posts.index');
    }

    public function show(Post $post)
    { // или {  show($id){
        return view('post.show', compact('post'));
    }

    public function edit(Post $post)
    { // или {  show($id){
        return view('post.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    { // или {  show($id){
        $data = $request->validate(['title' => 'required', 'content' => 'required', 'image' => '']);
        $test = $post->update($data);

        return redirect()->route('posts.index');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index');

    }

    public function firstOrCreate()
    { //  or updateOrCreate
        $post = Post::where([['title', '=', 1231]])->first();
        $myPost = Post::firstOrCreate(['title' => 123123], ['title' => 123122, 'content' => 123122]);
        dump($myPost);
    }
}
