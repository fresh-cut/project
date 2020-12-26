<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="{{asset('css/css/app.css')}}">
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-2 sidebar">
            <ul class="sidebar-menu list-unstyled">
                <li class="sidebar-menu-item"><a class="sidebar-menu-link" href="{{ route('admin.regions.index') }}">Регионы / Города</a></li>
                <li class="sidebar-menu-item"><a class="sidebar-menu-link" href="{{ route('admin.categories.index') }}">Категории</a>
                </li>
                <li class="sidebar-menu-item"><a class="sidebar-menu-link" href="#3">Компании</a></li>
                <li class="sidebar-menu-item"><a class="sidebar-menu-link" href="#3">Новости</a></li>
                <li class="sidebar-menu-item"><a class="sidebar-menu-link" href="{{ route('admin.reviews.index') }}">Отзывы</a></li>
                <li class="sidebar-menu-item"><a class="sidebar-menu-link" href="{{ route('admin.settings') }}">Глобальные настройки</a></li>
                <li class="sidebar-menu-item"><a class="sidebar-menu-link" href="#3">Выход</a></li>
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
