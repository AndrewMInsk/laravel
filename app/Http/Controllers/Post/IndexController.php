<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\FilterRequest;
use App\Http\Resources\Post\PostResource;
use App\Models\Category;
use App\Models\Post;
use App\Models\Posttest;
use App\Models\Tag;
use App\Models\Tagtest;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;


class IndexController extends BaseController
{
        public function __invoke(FilterRequest $request)
        {
        //   $this->authorize('view', auth()->user());
        //    Gate::authorize('view', User::class);

            // $posts = Post::where(['id'=>10])->get();
           $posts = $this->service->index($request);
           return PostResource::collection($posts);
            // dd($tag2->posts); // работает чере связи по конвенции
            return view('post/index', compact('posts'));
        }
}
