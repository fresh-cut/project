@extends('admin.adminTemplate')
@section('title')
    Все категории
@endsection
@section('content')
    <h1>Все категории</h1>
    <nav>
        <a href="{{ route('admin.categories.create') }}" class="btn btn-success">Добавить категорию</a>
    </nav>
    <br>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <input type="text" class="form-control search" id="category" onkeyup="run()" autocomplete="off">
            </div>
        </div>
    </div>
    <div id="results">
        @include('admin.categories.includes.results')
    </div>


    <script type="text/javascript">
        function run(){
            var arr='term='+$('#category').val();
            $.ajax({
                url: '{{ route('admin.categories.search') }}',
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

