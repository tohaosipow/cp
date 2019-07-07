<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.6/Chart.bundle.min.js"></script>
    <script src="https://api-maps.yandex.ru/2.1/?apikey=2893e5a3-7caa-4b04-95d4-1a48a3395992&lang=ru_RU" type="text/javascript">
    </script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div id="app">
    <div class="left-menu">
        <div class="profile">
            <div class="user-icon">
                <img src="{{\Illuminate\Support\Facades\Auth::user()->photo_url}}" alt="">
            </div>
            <div class="user-name">
                <div class="name">
                    {{\Illuminate\Support\Facades\Auth::user()->last_name}}
                    {{mb_substr(\Illuminate\Support\Facades\Auth::user()->first_name, 0, 1)}}.
                    {{mb_substr(\Illuminate\Support\Facades\Auth::user()->third_name, 0, 1)}}.
                </div>
                <div class="role">администратор</div>
            </div>
            <ion-icon name="log-out"></ion-icon>
        </div>
        <ul class="menu">
            <li>
                <a href="{{route('dashboard', Request::route('provider'))}}">
                    <ion-icon name="wifi"></ion-icon>
                    Рабочий стол</a>
            </li>
            <li>
                <a href="{{route('all-application', Request::route('provider'))}}">
                    <ion-icon name="clipboard"></ion-icon>
                    Все заявки</a>
            </li>
            <li>
                <a href="{{route('applications', Request::route('provider'))}}">
                    <ion-icon name="glasses"></ion-icon>
                    Мои заявки</a>
            </li>
            <li>
                <a href="#">
                    <ion-icon name="stats"></ion-icon>
                    Статистика</a>
            </li>
            <li>
                <a href="{{route('categories', Request::route('provider'))}}">
                    <ion-icon name="settings"></ion-icon>
                    Категории</a>
            </li>
        </ul>

    </div><!--
    !-->
    <div class="content">
            <div class="page-header">
            <span>{{$title}}
        <span class="describe">{{$describe}}</span>
        </span>
            </div>
        @yield('content')
    </div>

</div>
</body>
</html>
