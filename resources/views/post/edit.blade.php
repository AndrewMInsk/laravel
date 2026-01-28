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
        <input type="text" class="form-control" id="tet" name="title" aria-describedby="emailHelp" value="{{$post->title}}">
        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
    </div>
    <div class="mb-3">
        <label for="content" class="form-label">content</label>
        <textarea type="text" class="form-control" id="tet" name="content" aria-describedby="emailHelp">{{$post->title}}</textarea>
        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
    </div>
    <div class="mb-3">
        <label for="image" class="form-label">image</label>
        <input type="text" class="form-control" id="tet" name="image" aria-describedby="emailHelp" {{$post->image}}>
        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
</form>

@endsection
