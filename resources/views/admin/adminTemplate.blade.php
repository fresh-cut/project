<!DOCTYPE html>
<html lang="ru">
<head>
    <link rel="stylesheet" href="{{asset('css/css/app.css')}}">
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <link rel="shortcut icon" href="/favicon.png" type="image/x-icon">
    <meta name="robots" content="noindex, nofollow, noarchive">
    <link rel="icon" href="/favicon.png" type="image/x-icon">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/js/bootstrap.min.js"></script>

</head>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-2 sidebar" >
            <ul class="sidebar-menu list-unstyled">
                <li class="sidebar-menu-item"><a class="sidebar-menu-link" href="{{ route('admin.regions.index') }}">Регионы / Города</a></li>
                <li class="sidebar-menu-item"><a class="sidebar-menu-link" href="{{ route('admin.categories.index') }}">Категории</a></li>
                <li class="sidebar-menu-item"><a class="sidebar-menu-link" href="{{ route('admin.company.index') }}">Все компании</a></li>
                <li class="sidebar-menu-item"><a class="sidebar-menu-link" href="{{ route('admin.offers-companies.index') }}">Компании<br>(правки/предложения)</a></li>
                <li class="sidebar-menu-item"><a class="sidebar-menu-link" href="{{ route('admin.reviews.index') }}">Отзывы</a></li>
                <li class="sidebar-menu-item"><a class="sidebar-menu-link" href="{{ route('admin.settings') }}">Глобальные настройки</a></li>
                <li class="sidebar-menu-item"><a class="sidebar-menu-link" href="{{ route('admin.translate') }}">Переводы</a></li>
{{--                <li class="sidebar-menu-item"><a class="sidebar-menu-link" href="{{ route('admin.pages') }}">Страницы</a></li>--}}
                <li class="sidebar-menu-item"><a class="sidebar-menu-link" href="{{ route('home') }}">Вернуться на сайт</a></li>
                <li class="sidebar-menu-item"><a class="sidebar-menu-link" href="{{ route('logout') }}">Выход</a></li>
            </ul>
        </div>
        <div class="col-10">

        @yield('content')
        </div>
    </div>
</div>
<script scr="{{ asset('js/app.js')}}"></script>
</body>
</html>
