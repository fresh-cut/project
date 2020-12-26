@extends('admin.adminTemplate')
@section('title')
    Города в {{ $region->name }}
@endsection
@section('content')
    <h1>Все города в {{ $region->name }}</h1>
    <nav>
        <a href="{{ route('admin.localities.create', $region->id) }}" class="btn btn-success">Добавить город</a>
    </nav>
    <br>
    <table class="table">
        <thead>
        <tr style="text-align: left">
            <th>id</th>
            <th>Название города</th>
            <th>Url</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($localities as $locality)
            <tr>
                <td align="left" width="5%">{{$locality->id}}</td>
                <td align="left">
                    <a href="{{ route('admin.localities.edit',[$locality->region_id, $locality->id]) }}">
                        {{$locality->name}}
                    </a>
                </td>
                <td align="left">{{$locality->url}}</td>
                <td align="left">
{{--                    <a href="" class="btn btn-warning">Добавить город</a>--}}
{{--                    <a href="" class="btn btn-danger">Удалить</a>--}}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
