@extends('admin.adminTemplate')
@section('title')
    Все настройки
@endsection
@section('content')
    @include('admin.includes.result_messages')
    <div class="row">
        <div class="col-md-9">
            <div class="page-header">
                <h3 style="margin-bottom: 0; color:#0d5c6d">Основные настройки сайта</h3>
                <hr style="margin-top: 0">
            </div>
            @foreach($mainSettings as $key=>$value)
                <label>
                    <?php echo $value[0] ?>
                    <input type="{{ $value[1] }}" class="form-control" onblur="run('{{$key}}')" style="width: 350px;" id="{{ $key }}" name="{{ $key }}" value="{{ settings($key) }}" autocomplete="off">
                </label>
            @endforeach
            <hr>
        </div>
    </div>
    <div class="row">
        <div class="col-md-9">
            <div class="page-header">
                <h3 style="margin-bottom: 0; color:#0d5c6d">Url на другие каталоги</h3>
                <p class="ml-5">
                    Образец:<br>
                    {<br>
                        "имя1":"ссылка1",<br>
                        ....<br>
                        "имяN":"ссылкаN" (после каждой строчки запятая, кроме последней строки)
                    <br>}
                </p>
                <hr style="margin-top: 0; ">
            </div>
            <div class="form-group">
                @foreach($urlOtherCatalogs as $key=>$value)
                    <label>
                        {{ $value[0] }}
                        <textarea style="width: 800px;" onblur="run('{{$key}}')" id="{{ $key }}" name="{{ $key }}" class="form-control"  rows="10">{{ settings($key) }}</textarea>
                    </label>
                @endforeach
            </div>

            <hr>
        </div>
    </div>
    <div class="row">
        <div class="col-md-9">
            <div class="page-header">
                <h3 style="margin-bottom: 0; color:#0d5c6d">Цветовые настройки сайта</h3>
                <hr style="margin-top: 0">
            </div>
            @foreach($colorSettings as $key=>$value)
                <label>
                    {{ $value[0] }}
                    <input type="{{ $value[1] }}" class="form-control" onblur="run('{{$key}}')" style="width: 350px;" id="{{ $key }}" name="{{ $key }}" value="{{ settings($key, $value[2]) }}" autocomplete="off">
                </label>
            @endforeach
            <hr>
        </div>
    </div>
    <div class="row">
        <div class="col-md-9">
            <div class="page-header">
                <h3 style="margin-bottom: 0; color:#0d5c6d">Добавить код</h3>
                <hr style="margin-top: 0; ">
            </div>
            @foreach($addCode as $key=>$value)
                <label>
                    {{ $value[0] }}
                    <textarea onblur="run('{{$key}}')" style="width: 800px;" id="{{ $key }}" name="{{ $key }}" class="form-control"  rows="7">{{ settings($key) }}</textarea>
                </label>
            @endforeach
            <hr>
        </div>
    </div>
    <div class="row">
        <div class="col-md-9">
            <div class="page-header">
                <h3 style="margin-bottom: 0; color:#0d5c6d">Настройки рекламы (главная страница)</h3>
                <hr style="margin-top: 0; ">
            </div>
            @foreach($landingAdsSettings as $key=>$value)
                <label>
                    {{ $value[0] }}
                        <textarea onblur="run('{{$key}}')" style="width: 350px;" id="{{ $key }}" name="{{ $key }}" class="form-control"  rows="7">{{ settings($key) }}</textarea>
                </label>
            @endforeach
            <hr>
        </div>
    </div>
    <div class="row">
        <div class="col-md-9">
            <div class="page-header">
                <h3 style="margin-bottom: 0; color:#0d5c6d">Настройки рекламы (cтраница региона/города)</h3>
                <hr style="margin-top: 0; ">
            </div>
            @foreach($regionAdsSetting as $key=>$value)
                <label>
                    {{ $value[0] }}
                        <textarea onblur="run('{{$key}}')" style="width: 350px;" id="{{ $key }}" name="{{ $key }}" class="form-control"  rows="7">{{ settings($key) }}</textarea>
                </label>
            @endforeach
            <hr>
        </div>
    </div>
    <div class="row">
        <div class="col-md-9">
            <div class="page-header">
                <h3 style="margin-bottom: 0; color:#0d5c6d">Настройки рекламы (cтраница компании)</h3>
                <hr style="margin-top: 0; ">
            </div>
            @foreach($companyAdsSettings as $key=>$value)
                <label>
                    {{ $value[0] }}
                        <textarea onblur="run('{{$key}}')" style="width: 350px;" id="{{ $key }}" name="{{ $key }}" class="form-control"  rows="7">{{ settings($key) }}</textarea>
                </label>
            @endforeach
            <hr>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <h3 style="margin-bottom: 0; color:#0d5c6d">Текущая шапка</h3>
                <hr style="margin-top: 0">
            </div>
            <img class="img-fluid" src="../img/bg_first_big.jpg" alt="...">
            <form class="form-control" action="{{ route("admin.download.head") }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <input type="file" class="form-control-file" name="image" accept="image/jpg" class="form-control-file" >
                    <button class="btn btn-success" type="submit">загрузить</button>
                </div>
            </form>
        </div>
        <hr>
    </div>

    <div class="row mt-5">
        <div class="col-md-12">
            <div class="page-header">
                <h3 style="margin-bottom: 0; color:#0d5c6d">Текущий лого</h3>
                <hr style="margin-top: 0">
            </div>
            <img class="img-fluid" src="../img/logo.png" width="220px" height="60px" alt="...">
            <form class="form-control" action="{{ route("admin.download.logo") }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <input type="file" class="form-control-file" name="image" accept="image/png" class="form-control-file" >
                    <button class="btn btn-success" type="submit">загрузить</button>
                </div>
            </form>
        </div>
        <hr>
    </div>

    <div class="row mt-5">
        <div class="col-md-12">
            <div class="page-header">
                <h3 style="margin-bottom: 0; color:#0d5c6d">Текущая иконка</h3>
                <hr style="margin-top: 0">
            </div>
            <img class="img-fluid" src="../favicon.png" width="150px" height="150px" alt="...">
            <form class="form-control" action="{{ route("admin.download.favicon") }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <input type="file" class="form-control-file" name="image" accept="image/png" class="form-control-file" >
                    <button class="btn btn-success" type="submit">загрузить</button>
                </div>
            </form>
        </div>
        <hr>
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
