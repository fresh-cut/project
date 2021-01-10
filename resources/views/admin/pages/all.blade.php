@extends('admin.adminTemplate')
@section('title')
   Страницы
@endsection
@section('content')
    <h1>Страницы</h1>
    <br>
    @include('admin.includes.result_messages')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="car-subtitle mb-2 text-muted"></div>
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#error" aria-controls="error" aria-selected="true" role="tab">404</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " data-toggle="tab" href="#contact_us" aria-controls="contact_us" aria-selected="false" role="tab">Contact Us</a>
                        </li>
                    </ul>
                    <br>
                    <div class="tab-content">
                        <div class="tab-pane active" id="error" role="tabpanel" aria-labelledby="error-tab">
                            @include('admin.pages.includes.404')
                        </div>
                        <div class="tab-pane" id="contact_us" role="tabpanel" aria-labelledby="contact_us-tab">
                            @include('admin.pages.includes.contactUs')
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
            url: '{{ route('admin.add_404') }}',
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
