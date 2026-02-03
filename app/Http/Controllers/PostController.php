<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\PostTag;
use App\Models\Posttest;
use App\Models\Tag;
use App\Models\Tagtest;
use Illuminate\Http\Request;
use JetBrains\PhpStorm\NoReturn;

class PostController extends Controller
{
    public function index()
    {
        $post = Post::find(1);
        $post2 = Posttest::find(1);
        $category = Category::find(1);
        $tag = Tag::find(1);
        $tag2 = Tagtest::find(1);
        $posts = Post::all();
       // dd($tag2->posts); // работает чере связи по конвенции
        return view('post/index', compact('posts'));
    }

    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view('post/create', compact('categories', 'tags'));
    }

    #[NoReturn] public function store(Request $request)
    { // тут я сделал неверно, по конвенции нужно отдельный метод

        $data = $request->validate(['title' => 'required|strind', 'content' => 'required', 'image' => '', 'id' => '', 'category_id' => '', 'tags' => '']);
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
        return redirect()->route('posts.index');
    }

    public function show(Post $post)
    { // или {  show($id){
        return view('post.show', compact('post'));
    }

    public function edit(Post $post)
    { // или {  show($id){
        $categories = Category::all();
        $tags = Tag::all();

        return view('post.edit', compact('post', 'categories','tags'));
    }

    public function update(Request $request, Post $post)
    { // или {  show($id){
        $data = $request->validate(['title' => 'required', 'content' => 'required', 'image' => '','category_id' => '', 'tags' => '']);
        $tags = $data['tags']??[];
        unset($data['tags']);
        $test = $post->update($data);
        $post->tags()->sync($tags); // не тупо добавляет а синкает
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
