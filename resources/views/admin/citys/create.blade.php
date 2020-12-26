@extends('admin.adminTemplate')
@section('title')
    Добавить город в {{ $region->name }}
@endsection
@section('content')
    <h1>Добавление города в {{ $region->name }}</h1>
    @include('admin.includes.result_messages')
    <form action="{{ route('admin.localities.store', $region->id) }}" method="post">
        @csrf
        @method('POST')
        <div class="form-group">
            <label for="title">Название</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', '') }}" autocomplete="off" required>
        </div>
        <input type="hidden" name="region_id" value="{{ $region->id }}">
        <div class="form-group">
            <label for="slug">Url</label>
            <input type="text" class="form-control" id="url" name="url" value="{{ old('url', '') }}" autocomplete="off" required>
        </div>
        <div class="form-group">
            <button class="btn btn-dark" type="submit">Сохранить</button>
        </div>
    </form>
@endsection
