@extends('admin.adminTemplate')
@section('title')
    Все категории
@endsection
@section('content')
    <h1>Все категории</h1>
    <nav>
        <a href="{{ route('admin.categories.create') }}" class="btn btn-success">Добавить категорию</a>
    </nav>
    <br>
    <table class="table">
        <thead>
        <tr style="text-align: left">
            <th>id</th>
            <th>Название категории</th>
            <th>Url</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($categories as $category)
            <tr>
                <td align="left" width="5%">{{$category->id}}</td>
                <td align="left">
                    <a href="{{ route('admin.categories.edit',$category->id) }}">
                        {{$category->name}}
                    </a>
                </td>
                <td align="left">{{$category->url}}</td>
                <td align="left">
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
