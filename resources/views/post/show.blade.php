@extends('layout.main')
@section('content')
Наш один пост


        {{$post->id}}. {{$post->title}}
<div>
    <a href="{{route('posts.index')}}">К списку</a>
</div>
@endsection
