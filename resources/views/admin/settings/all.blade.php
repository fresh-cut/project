@extends('admin.adminTemplate')
@section('title')
    Все категории
@endsection
@section('content')
    <h1>Все настройки</h1>
    @include('admin.includes.result_messages')
    <div class="row">
        <div class="col-md-6 ">
            <p>Текущая шапка</p>
            <img class="img-fluid" src="../img/bg_first_big.jpg" alt="...">
            <form class="form-control" action="{{ route("admin.download") }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="exampleFormControlFile1">Для загрузки новой шапки </label>
                    <input type="file" name="image" class="form-control-file" id="exampleFormControlFile1">
                </div>
                <div class="form-group">
                    <button type="submit">отправить</button>
                </div>
            </form>
        </div>

    </div>


@endsection
