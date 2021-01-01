@extends('admin.adminTemplate')
@section('title')
    Все настройки
@endsection
@section('content')

    <h1>Все настройки</h1>
    @include('admin.includes.result_messages')
    <div class="row">
        <div class="col-md-12">
            @foreach($data as $key=>$value)
            <form id="form-{{ $key }}">
                @csrf
                <label>
                    {{ $value[0] }}
                    <input type="{{ $value[1] }}" class="form-control" onblur="run('{{$key}}')" style="width: 350px;" id="{{ $key }}" name="{{ $key }}" value="{{ settings($key) }}" autocomplete="off">
                    <button class="visually-hidden" disabled></button>
                </label>
            </form>
            @endforeach
        </div>
    </div>

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



@endsection

    <script src="//code.jquery.com/jquery-3.5.1.min.js" ></script>
<script>
    function run(key){
        var arr=key+'='+$('#'+key).val();
        $.ajax({
            url: '{{ route('admin.addSettings') }}',
            type: "POST",
            traditional: true,
            data:  arr,
            headers: {
                'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content'),
                'X-Requested-With': 'XMLHttpRequest'
            },
            success: function (data) {
                $('#'+key).removeClass('nocheck').addClass('check');
            },
            error: function (msg) {
                $('#'+key).removeClass('check').addClass('nocheck');
            }
        });
    }
</script>

<style>
    .check{
        background: url('../../img/formCheck/check.png');
        background-size: 20px;
        background-repeat: no-repeat;
        background-position: right center;
    }
    .nocheck{
        background: url('../../img/formCheck/nocheck.png');
        background-size: 20px;
        background-repeat: no-repeat;
        background-position: right center;
    }

    .visually-hidden {
        position: absolute;
        clip: rect(0 0 0 0);
        width: 1px;
        height: 1px;
        margin: -1px;
    }


</style>
