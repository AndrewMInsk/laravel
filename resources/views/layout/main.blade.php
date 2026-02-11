<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <link rel="stylesheet" href="{{asset('css/apptheme.css')}}">
</head>
<body>
<div class="container">
    <div class="row">
        <ul>
            <li><a href="{{route('home.index')}}">Главная</a></li>
            <li><a href="{{route('posts.index')}}">Посты</a></li>
            <li><a href="{{route('posts.create')}}">Пост создать</a></li>
            <li><a href="{{route('about.index')}}">О нас</a></li>
            <li><a href="{{route('contacts.index')}}">Контакты</a></li>
            @can('view',auth()->user())
            <li><a href="{{route('admin.post.index')}}">Admin</a></li>
            @endcan
        </ul>
    </div>
</div>
<div class="container">
    <div class="row">
        @yield('content')
    </div>
</div>

</body>
</html>
