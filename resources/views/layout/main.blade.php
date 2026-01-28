<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <link rel="stylesheet" href="/css/apptheme.css">
</head>
<body>
<div>
    <ul>
        <li><a href="{{route('home.index')}}">Главная</a></li>
        <li><a href="{{route('about.index')}}">О нас</a></li>
        <li><a href="{{route('contacts.index')}}">Контакты</a></li>
    </ul>
</div>
@yield('content')
</body>
</html>
