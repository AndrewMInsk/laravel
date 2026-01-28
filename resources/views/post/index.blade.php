@extends('layout.main')
@section('content')
    Наши посты<br/>

    @foreach($posts as $post)
        {{$post->id}}.
        <a href="{{route('posts.show', $post->id)}}">
            {{$post->title}}
        </a>
        <a href="{{route('posts.edit', $post->id)}}">
            Редактировать
        </a>
        <form action="{{route('posts.destroy', $post->id)}}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit">Удалить</button>
        </form>
   
    @endforeach
    <a href="{{route('posts.create')}}">Создать</a>
@endsection
