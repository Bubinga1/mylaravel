<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
        <nav>
            <ul>
                <li><a href="{{route('main.index')}}">Главная</a></li>
                <li><a href="{{route('about.index')}}">About</a></li>
                <li><a href="{{route('contact.index')}}">Контакты</a></li>
                <li><a href="{{route('post.index')}}">Пост</a></li>
            </ul>
        </nav>
    </div>
    @yield('content')
</body>
</html>