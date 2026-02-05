@extends('layout.main')
@section('content')
    Наши посты


    <!-- /resources/views/post/create.blade.php -->

    <h1>Create Post</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <!-- Create Post Form -->

    <form action="{{route('posts.update', $post->id)}}" method="post">
        @csrf
        @method('PATCH')
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="tet" name="title" aria-describedby="emailHelp"
                   value="{{old('title') ?? $post->title}}">
            @error('title')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">content</label>
            <textarea type="text" class="form-control" id="tet" name="content"
                      aria-describedby="emailHelp">{{$post->title}}</textarea>
            @error('content')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">image</label>
            <input type="text" class="form-control" id="tet" name="image" aria-describedby="emailHelp" value="{{$post->image}}">
            <img src="{{$post->image}}" alt="">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <select name="category_id">
            @foreach ($categories as $category)
                <option value="{{$category->id}}"
                        @if($category->id == $post->category->id) selected @endif>{{ $category->title }}</option>
            @endforeach

        </select>
        <select name="tags[]" multiple>
            @foreach ($tags as $tag)
                <option value="{{$tag->id}}"
                    @foreach($post->tags as $postTag)

                        {{$tag->id == $postTag->id?'selected':''}}

                        @endforeach



                >{{ $tag->title }}</option>
            @endforeach

        </select>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>

@endsection
