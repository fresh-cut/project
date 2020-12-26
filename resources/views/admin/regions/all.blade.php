@extends('admin.adminTemplate')
@section('title')
    Все регионы
@endsection
@section('content')
    <h1>Все регионы</h1>
    <nav>
        <a href="{{ route('admin.regions.create') }}" class="btn btn-success">Добавить регион</a>
    </nav>
    <br>
    <table class="table">
        <thead>
        <tr style="text-align: left">
            <th>id</th>
            <th>Название региона</th>
            <th>Url</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($regions as $region)
            <tr>
                <td align="left" width="5%">{{$region->id}}</td>
                <td align="left">
                    <a href="{{ route('admin.regions.edit',$region->id) }}">
                        {{$region->name}}
                    </a>
                </td>
                <td align="left">{{$region->url}}</td>
                <td align="left">
                    <a href="{{ route('admin.localities.index', $region->id) }}" class="btn btn-warning">Города</a>
{{--                    <a href="" class="btn btn-danger">Удалить</a>--}}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
