@extends('admin.adminTemplate')
@section('title')
    Города в {{ $region->name }}
@endsection
@section('content')
    <h1>Все города в {{ $region->name }}</h1>
    <nav>
        <a href="{{ route('admin.localities.create', $region->id) }}" class="btn btn-success">Добавить город</a>
        <a href="{{ route('admin.regions.index') }}" class="btn btn-secondary ">назад</a>
    </nav>
    <br>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <input type="text" class="form-control search" id="locality" autocomplete="nope" onkeyup="run()" >
            </div>
        </div>
    </div>
    <div id="results">
        @include('admin.citys.includes.results')
    </div>

    <script type="text/javascript">
        function run(){
            var arr='term='+$('#locality').val();
            $.ajax({
                url: '{{ route('admin.localities.search', $region->id) }}',
                type: "POST",
                traditional: true,
                data:  arr,
                headers: {
                    'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content'),
                    'X-Requested-With': 'XMLHttpRequest'
                }}).done(function(response){
                $('#results').html(response); // put the returning html in the 'results' div
            });
        }
    </script>
@endsection
<style>
    .search{
        background: url('/img/formCheck/search.png');
        background-size: 40px;
        background-repeat: no-repeat;
        background-position: right center;
    }
</style>
