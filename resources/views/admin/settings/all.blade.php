@extends('admin.adminTemplate')
@section('title')
    Все категории
@endsection
@section('content')
    <h1>Все настройки</h1>
    @include('admin.includes.result_messages')
    <div class="row">
        <div class="col-md-12">
            <p>Текущая шапка</p>
            <img class="img-fluid" src="../img/bg_first_big.jpg" alt="...">
            <form class="form-control" action="{{ route("admin.download") }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <input type="file" class="form-control-file" name="image" accept="image/jpg" class="form-control-file" >

                    <button class="btn btn-success" type="submit">отправить</button>
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">

        </div>
    </div>


@endsection
