@extends('layout.main')
@section('content')
Наши посты

    @foreach($posts as $post)
        {{$post->title}}

    @endforeach
@endsection
