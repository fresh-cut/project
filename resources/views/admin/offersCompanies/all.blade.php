@extends('admin.adminTemplate')
@section('title')
   Компании-правки/предложения
@endsection
@section('content')
    <h1>Компании-правки/предложения</h1>
    <br>
    @include('admin.includes.result_messages')
    @include('admin.offersCompanies.includes.main_col')

@endsection
