@extends('admin.adminTemplate')
@section('title')
    Редактирование города {{ $locality->name }} в {{ $region->name }}
@endsection
@section('content')
            <h1>Редактирование города в {{ $region->name }}</h1>
            @include('admin.includes.result_messages')
            <form action="{{ route('admin.localities.update', [$region->id, $locality->id]) }}" method="post">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <label for="title">Название</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $locality->name) }}" autocomplete="off" required>
                </div>
                <input type="hidden" name="region_id" value="{{ $region->id }}">
                <div class="form-group">
                    <label for="slug">Url</label>
                        <input type="text" class="form-control" id="url" name="url" value="{{ old('url', $locality->url) }}" autocomplete="off" required>
                </div>
                <div class="form-group">
                    <button class="btn btn-dark" type="submit">Сохранить</button>
                </div>
            </form>
@endsection
