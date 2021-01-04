@extends('admin.adminTemplate')
@section('title')
    Переводы
@endsection
@section('content')
    @include('admin.includes.result_messages')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body justify-content-center">
                    <div class="car-subtitle mb-2 text-muted"></div>
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#landingPage" aria-controls="landingPage" aria-selected="true" role="tab">Главная страница</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " data-toggle="tab" href="#companyPage" aria-controls="companyPage" aria-selected="false" role="tab">Страница компании</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " data-toggle="tab" href="#regionPage" aria-controls="regionPage" aria-selected="false" role="tab">Страница региона</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " data-toggle="tab" href="#localityPage" aria-controls="localityPage" aria-selected="false" role="tab">Страница города</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " data-toggle="tab" href="#asidePage" aria-controls="asidePage" aria-selected="false" role="tab">Боковая панель</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " data-toggle="tab" href="#footerPage" aria-controls="footerPage" aria-selected="false" role="tab">Footer сайта</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " data-toggle="tab" href="#allStatesPage" aria-controls="allStatesPage" aria-selected="false" role="tab">Страница All states</a>
                        </li>
                    </ul>
                    <br>
                    <div class="tab-content">
                        <div class="tab-pane active" id="landingPage" role="tabpanel" aria-labelledby="landingPage-tab">
                            @include('admin.translate.includes.landingPage')
                        </div>
                        <div class="tab-pane" id="companyPage" role="tabpanel" aria-labelledby="companyPage-tab">
                            @include('admin.translate.includes.companyPage')
                        </div>
                        <div class="tab-pane" id="regionPage" role="tabpanel" aria-labelledby="regionPage-tab">
                            @include('admin.translate.includes.regionPage')
                        </div>
                        <div class="tab-pane" id="localityPage" role="tabpanel" aria-labelledby="localityPage-tab">
                            @include('admin.translate.includes.localityPage')
                        </div>
                        <div class="tab-pane" id="asidePage" role="tabpanel" aria-labelledby="asidePage-tab">
                            @include('admin.translate.includes.asidePage')
                        </div>
                        <div class="tab-pane" id="footerPage" role="tabpanel" aria-labelledby="footerPage-tab">
                            @include('admin.translate.includes.footerPage')
                        </div>
                        <div class="tab-pane" id="allStatesPage" role="tabpanel" aria-labelledby="allStatesPage-tab">
                            @include('admin.translate.includes.allStatesPage')
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>



@endsection

    <script src="//code.jquery.com/jquery-3.5.1.min.js" ></script>
<script>
    function run(key){
        var arr=key+'='+$('#'+key).val();
        $.ajax({
            url: '{{ route('admin.addTranslate') }}',
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
