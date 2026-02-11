<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Post\BaseController;
use App\Http\Requests\FilterRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Posttest;
use App\Models\Tag;
use App\Models\Tagtest;
use Illuminate\Foundation\Http\FormRequest;


class IndexController extends BaseController
{
        public function __invoke(FilterRequest $request)
        {
            // $posts = Post::where(['id'=>10])->get();
            $posts = $this->service->index($request);
            // dd($tag2->posts); // работает чере связи по конвенции
            // dd($tag2->posts); // работает чере связи по конвенции
            return view('admin/post/index', compact('posts'));
        }
}
