<?php

namespace App\Services\Post;

use App\Http\Filters\PostFilter;
use App\Http\Requests\FilterRequest;
use App\Http\Requests\SomeRequest;
use App\Models\Category;
use App\Models\Categorytest;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Support\Facades\DB;

class Service
{

    public function index(FilterRequest $request)
    {
        $data = $request->validated();
        $query = Post::query();
        if (isset($data['category_id'])) {
            $query->where('category_id', $data['category_id']);
        }
        if (isset($data['title'])) {
            $query->where('title', 'like', '%' . $data['title'] . '%');
        }
        $posts = $query->paginate(5);
        $filter = app()->make(PostFilter::class, ['queryParams' => array_filter($data)]);
        $posts = Post::filter($filter); // тут нужно get для API

        // $posts = Post::where(['id'=>10])->get();
        return $posts;

    }

    public function store($data)
    {

        try {
        DB::beginTransaction();
            if (!isset($data['tags'])) {
                $data['tags'] = [];
            }
            if (isset($data['category'])) {

                $category = $data['category'];
            }


            $tags = $data['tags'];
            unset($data['tags'], $data['category']); // тэги нам в дате не нужны
            $tagIds = $this->getTagIds($tags);

            $data['category_id'] = $this->getCategoryId($category);


            $post = Post::updateOrCreate(['title' => $data['title']], $data);
//        foreach ($tags as $tag) {
//            PostTag::firstOrCreate([
//                'post_id' => $post->id,
//                'tag_id' => $tag,
//            ]);
//        }
            $post->tags()->sync($tagIds); // добавляет тэги. Может быть тут лучше sync? да, так работает тоже
        DB::commit();

        }
        catch (\Exception $e) {
            dd('error', $e);
            DB::rollBack();
            return $e->getMessage();
        }
        return $post;

    }

    private function getTagIds($tags)
    {
        $tagIds = [];
        foreach ($tags as $tag) {
            if(!isset($tag['id'])){
                $tag =   Tag::create($tag);

            }
            else{
                $tag =   Tag::find($tag['id']);
            }
            $tagIds[] = $tag->id;
        }

        return $tagIds;
    }

    private function getCategoryId($item)
    {

        $category = !isset($item['id']) ? Category::create($item) : Category::find($item['id']);
        return $category->id;

    }
}
