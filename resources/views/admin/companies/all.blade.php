@extends('admin.adminTemplate')
@section('title')
    Компании
@endsection
@section('content')
    <h1>Компании</h1>
    <br>
    @include('admin.includes.result_messages')
    <div class="row">
        <div class="col-md-6">
            <form action="{{ route('admin.company.search') }}" method="post">
                @csrf
                <div class="form-group">
                    <input type="text" class="form-control" name="search" value="{{ old('search', '') }}" autocomplete="off" placeholder="поиск по url">
                </div>
                <div class="form-group">
                    <button class="btn btn-secondary" type="submit">найти</button>
                </div>
            </form>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h3>
                Последние добавленные компании
            </h3>
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>id</th>
                    <th>Название компании</th>
                    <th>Адресс</th>
                    <th>Сайт</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @if(isset($last_companies) && $last_companies->count())
                @foreach($last_companies as $company)
                    <tr>
                        <td>{{ $company->id }}</td>
                        <td>
                            <a href="{{ route('admin.company.edit', $company->id) }}">
                                {{ $company->name }}
                            </a>
                        </td>
                        <td>{{ $company->streetaddress }} </td>
                        <td>
                            <a href="<?php echo '//'.urldecode($company->website) ?>" target="_blank">
                                {{ urldecode($company->website) }}
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
