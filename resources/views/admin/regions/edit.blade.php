@extends('admin.adminTemplate')
@section('title')
    Изменить региона {{ $region->name }}
@endsection
@section('content')
            <h1>Редактирование региона</h1>
            @include('admin.includes.result_messages')
            <form action="{{ route('admin.regions.update', $region->id) }}" method="post">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <label for="title">Название</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $region->name) }}" autocomplete="off" required>
                </div>

                <div class="form-group">
                    <label for="slug">Url</label>
                        <input type="text" class="form-control" id="url" name="url" value="{{ old('url', $region->url) }}" autocomplete="off" required>
                </div>
                <div class="form-group">
                    <button class="btn btn-dark" type="submit">Сохранить</button>
                </div>
            </form>
@endsection
