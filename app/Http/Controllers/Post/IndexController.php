<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Posttest;
use App\Models\Tag;
use App\Models\Tagtest;


class IndexController extends BaseController
{
        public function __invoke()
        {
            $post = Post::find(1);
            $post2 = Posttest::find(1);
            $category = Category::find(1);
            $tag = Tag::find(1);
            $tag2 = Tagtest::find(1);
            $posts = $this->service->index();
            // dd($tag2->posts); // работает чере связи по конвенции
            return view('post/index', compact('posts'));
        }
}
