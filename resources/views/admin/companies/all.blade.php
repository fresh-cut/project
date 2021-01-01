@extends('admin.adminTemplate')
@section('title')
    Все компании
@endsection
@section('content')
    <h1>Все компании</h1>
{{--    <nav>--}}
{{--        <a href="{{ route('admin.regions.create') }}" class="btn btn-success">Добавить компанию</a>--}}
{{--    </nav>--}}
    <br>
    @include('admin.includes.result_messages')
    @include('admin.companies.includes.main_col')

@endsection
