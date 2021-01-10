@extends('admin.adminTemplate')
@section('title')
    Поиск компании
@endsection
@section('content')
    <h1>Компании поиск</h1>
    <br>
    @include('admin.includes.result_messages')
    <div class="row">
        <div class="col-md-6">
            <form action="{{ route('admin.company.search') }}" method="post">
                @csrf
                <div class="form-group">
                    <input type="text" class="form-control" name="search" value="{{ old('search', $searchValue) }}" autocomplete="off" placeholder="поиск">
                </div>
                <div class="form-group">
                    <button class="btn btn-dark" type="submit">найти</button>
                    <a href="{{ route('admin.company.index') }}" class="btn btn-secondary ">назад</a>
                </div>
            </form>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h3>
                Найденные компании
            </h3>
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>id</th>
                    <th>Название компании</th>
                    <th>Url</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @if(isset($findCompany) && $findCompany->count())
                @foreach($findCompany as $company)
                    <tr>
                        <td>{{ $company->id }}</td>
                        <td>
                            <a href="{{ route('admin.company.edit', $company->id) }}">
                                {{ $company->name }}
                            </a>
                        </td>
                        <td>
                            <a href="{{ route('company', [$company->region_url, $company->locality_url, $company->url]) }}" target="_blank">
                                {{ URL::route('company', [$company->region_url, $company->locality_url, $company->url]) }}
                            </a>
                        </td>
                        <td>
                        </td>
                    </tr>
                @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>

@endsection
<style>
    .visually-hidden {
        position: absolute;
        clip: rect(0 0 0 0);
        width: 1px;
        height: 1px;
        margin: -1px;
        …
    }
</style>
    <script src="//code.jquery.com/jquery-3.5.1.min.js" ></script>
<script>
    function getCheckedCheckBoxes() {
        var a=$('input:checked'); //выбираем все отмеченные checkbox
        var count=a.length;
        var el=document.getElementById('delete');
        el.classList.remove("visually-hidden");
        el.innerText = 'Удалить('+count+')';
        if(count==0) {
            el.classList.add("visually-hidden");
        }
    }
</script>
