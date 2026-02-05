<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\SomeRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Posttest;
use App\Models\Tag;
use App\Models\Tagtest;


class StoreController extends BaseController
{
        public function __invoke(SomeRequest $request)
        {
            $data = $request->validated();

            $this->service->store($data);
            return redirect()->route('posts.index');

        }
}
