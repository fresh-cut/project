@extends('admin.adminTemplate')
@section('title')
    Редактирование {{ $category->name }} категории
@endsection
@section('content')
            <h1>Редактирование категории</h1>
            @include('admin.includes.result_messages')
            <form action="{{ route('admin.categories.update', $category->id) }}" method="post">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <label for="title">Название</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $category->name) }}" autocomplete="off" required>
                </div>

                <div class="form-group">
                    <label for="slug">Url</label>
                        <input type="text" class="form-control" id="url" name="url" value="{{ old('url', $category->url) }}" autocomplete="off" required>
                </div>
                <div class="form-group">
                    <button class="btn btn-dark" type="submit">Сохранить</button>
                </div>
            </form>
@endsection
