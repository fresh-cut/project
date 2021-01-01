@extends('admin.adminTemplate')
@section('title')
    Правки компании <?=($item->type=='edit')?$old_item->name:$item->name ?>
@endsection
@section('content')
            @if($item->type=='edit')
                <h1>Предложенные правки компании <br> {{$old_item->name}}</h1>
            @else
               <h1> Новая компания <br> {{$item->name}}</h1>
            @endif
            @include('admin.includes.result_messages')
            <div class="row">

                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('admin.companies.update', $item->id) }}" method="post">
                                @csrf
                                @method('PATCH')
                                @if($item->type=='edit')
                                    <input type="hidden" name="type" value="edit">
                                @else
                                    <input type="hidden" name="type" value="add">
                                @endif
                                <input type="hidden" name="company_id" value="{{$item->company_id}}">
                                <div class="form-group" >
                                    <span <?= ($item->type=='edit')? "tooltip=\"исходное название: $old_item->name\"":''?> flow="right">
                                        <label for="name">Название</label>
                                    </span>
                                    <input type="text"  class="form-control" id="name" name="name" value="{{ old('name', $item->name) }}" autocomplete="off" required>
                                </div>

                                <div class="form-group">
                                    <span <?= ($item->type=='edit')? "tooltip=\"исходная категория: $old_item->category_name\"":''?> flow="right">
                                        <label for="searchcategory">Категория</label>
                                    </span>
                                    <input type="text" class="form-control" id="searchcategory" name="category_name" value="{{ old('category_name', $item->category_name) }}" autocomplete="off" required>
                                </div>

                                <div class="form-group">
                                    <span <?= ($item->type=='edit')? "tooltip=\"исходный регион: $old_item->region_name\"":''?> flow="right">
                                        <label for="searchregion">Регион</label>
                                    </span>
                                    <input type="text" class="form-control" id="searchregion" name="region_name" value="{{ old('region_name', $item->region_name) }}" autocomplete="off" required>
                                </div>

                                <div class="form-group">
                                    <span <?= ($item->type=='edit')? "tooltip=\"исходный город: $old_item->locality_name\"":''?> flow="right">
                                        <label for="searchlocality">Город</label>
                                    </span>
                                    <input type="text" class="form-control" id="searchlocality" name="locality_name" value="{{ old('locality_name', $item->locality_name) }}" autocomplete="off" required>
                                </div>

                                <div class="form-group">
                                    <span <?= ($item->type=='edit')? "tooltip=\"исходный адресс: $old_item->streetaddress\"":''?> flow="right">
                                        <label for="streetaddress">Адресс</label>
                                    </span>
                                    <input type="text" class="form-control" id="streetaddress" name="streetaddress" value="{{ old('streetaddress', $item->streetaddress) }}" autocomplete="off" required>
                                </div>

                                @if( $item->type=='add' )
                                    <div class="form-group">
                                        <label for="latitude">Широта</label>
                                        <input type="text" class="form-control" id='latitude' name="latitude" value="{{ old('latitude', '') }}" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="longitude">Долгота</label>
                                        <input type="text" class="form-control" id="longitude" name="longitude" value="{{ old('longitude', '') }}" required>
                                    </div>

                                    <div class="form-group">
                                        <button class="btn btn-secondary js_geo__btn">Сгенерировать</button>
                                    </div>
                                @endif


                                <div class="form-group">
                                    <span <?= ($item->type=='edit')? "tooltip=\"исходный почтовый индекс: $old_item->postalcode\"":''?> flow="right">
                                        <label for="postalcode">Почтовый индекс</label>
                                    </span>
                                    <input type="text" class="form-control" id="postalcode" name="postalcode" value="{{ old('postalcode', $item->postalcode) }}" autocomplete="off" required>
                                </div>

                                <div class="form-group">
                                    <span <?= ($item->type=='edit')? "tooltip=\"исходный телефон: $old_item->telephone\"":''?> flow="right">
                                        <label for="telephone">Телефон</label>
                                    </span>
                                    <input type="text" class="form-control" id="telephone" name="telephone" value="{{ old('telephone', $item->telephone) }}" autocomplete="off" required>
                                </div>

                                <div class="form-group">
                                    <span <?= ($item->type=='edit')? "tooltip=\"исходный сайт: urldecode($old_item->website)\"":''?> flow="right">
                                        <label for="website">Сайт</label>
                                    </span>
                                    <input type="text" class="form-control" id="website" name="website" value="{{ old('website', $item->website) }}" autocomplete="off" required>
                                </div>

                                <div class="form-group">
                                    <span <?= ($item->type=='edit')? "tooltip=\"исходное описание: $old_item->descr\"":''?> flow="right">
                                        <label for="descr">Описание</label>
                                    </span>
                                    <textarea name="descr" class="form-control" style="height: auto;" rows="10" required>{{old('descr', $item->descr)}}</textarea>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-dark" type="submit"><?= ($item->type=='edit')?'Принять изменения':'Добавить компанию'?></button>

                                </div>
                            </form>
                            <form action="{{ route('admin.companies.destroy', $item->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-warning"><?= ($item->type=='edit')?'Оставить прошлую версию':'Удалить предложение'?></button>
                            </form>
                        </div>
                    </div>
                </div>


                @if($item->type=='edit')
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <form action="">
                                    <div class="form-group" >
                                        <label for="name">Название</label>
                                        <input type="text"  class="form-control" id="name" name="name" value="{{ $old_item->name }}" disabled>
                                    </div>

                                    <div class="form-group">
                                        <label for="searchcategory">Категория</label>
                                        <input type="text" class="form-control" id="searchcategory" name="category_name" value="{{  $old_item->category_name }}" disabled>
                                    </div>

                                    <div class="form-group">
                                        <label for="searchregion">Регион</label>
                                        <input type="text" class="form-control" id="searchregion" name="region_name" value="{{ $old_item->region_name }}" disabled>
                                    </div>

                                    <div class="form-group">
                                        <label for="searchlocality">Город</label>
                                        <input type="text" class="form-control" id="searchlocality" name="locality_name" value="{{ $old_item->locality_name }}" disabled>
                                    </div>

                                    <div class="form-group">
                                        <label for="streetaddress">Адресс</label>
                                        <input type="text" class="form-control" id="streetaddress" name="streetaddress" value="{{  $old_item->streetaddress }}" disabled>
                                    </div>

                                    {{--                                @if($item->type=='add')--}}
                                    {{--                                    <div class="form-group">--}}
                                    {{--                                        <label for="latitude">Широта</label>--}}
                                    {{--                                        <input type="text" class="form-control" id='latitude' name="latitude" value="{{ $old_item->latitude }}" disabled>--}}
                                    {{--                                    </div>--}}

                                    {{--                                    <div class="form-group">--}}
                                    {{--                                        <label for="longitude">Долгота</label>--}}
                                    {{--                                        <input type="text" class="form-control" id="longitude" name="longitude" value="{{ $old_item->longitude }}" disabled>--}}
                                    {{--                                    </div>--}}
                                    {{--                                @endif--}}



                                    <div class="form-group">
                                        <label for="postalcode">Почтовый индекс</label>
                                        <input type="text" class="form-control" id="postalcode" name="postalcode" value="{{ $old_item->postalcode }}" disabled>
                                    </div>

                                    <div class="form-group">
                                        <label for="telephone">Телефон</label>
                                        <input type="text" class="form-control" id="telephone" name="telephone" value="{{  $old_item->telephone }}" disabled>
                                    </div>

                                    <div class="form-group">
                                        <label for="website">Сайт</label>
                                        <input type="text" class="form-control" id="website" name="website" value="{{ $old_item->website }}" disabled>
                                    </div>

                                    <div class="form-group">
                                        <label for="descr">Описание</label>
                                        <textarea name="descr" class="form-control" style="height: auto;" rows="10" disabled>{{ $old_item->descr }}</textarea>
                                    </div>
                            </div>
                        </div>
                    </div>
                @endif






            </div>
            <script type="text/javascript">
                $('#searchcategory').autocomplete({
                    source:'{!!URL::route('autocompleteCategory')!!}',
                    minlength:1,
                    autoFocus:true,
                });

                $('#searchregion').autocomplete({
                    source:'{!!URL::route('autocompleteRegion')!!}',
                    minlength:1,
                    autoFocus:true,
                });

                $('#searchlocality').autocomplete({
                    source:'{!!URL::route('autocompleteLocality')!!}',
                    minlength:1,
                    autoFocus:true,
                });

                $('.js_geo__btn').on('click', function () {
                    var address = $('#searchlocality').val();
                    // var arr = address.split(' / ');
                    // address = arr[1] + ', ' + arr[0];
                    address = $('#streetaddress').val() + ', ' + address;
                    console.log(address);
                    geocoder.geocode({'address': address}, function(results, status) {
                        if (status === google.maps.GeocoderStatus.OK) {
                            $('#latitude').val(results[0].geometry.location.lat());
                            $('#longitude').val(results[0].geometry.location.lng());
                        } else {
                            alert('Geocode was not successful for the following reason: ' + status);
                        }
                    });

                });
            </script>
@endsection
<style>
       /* START TOOLTIP STYLES */
    [tooltip] {
        position: relative; /* opinion 1 */
    }

    /* Applies to all tooltips */
    [tooltip]::before,
    [tooltip]::after {
        text-transform: none; /* opinion 2 */
        font-size: .9em; /* opinion 3 */
        line-height: 1;
        user-select: none;
        pointer-events: none;
        position: absolute;
        display: none;
        opacity: 0;
    }
    [tooltip]::before {
        content: '';
        border: 5px solid transparent; /* opinion 4 */
        z-index: 1001; /* absurdity 1 */
    }
    [tooltip]::after {
        content: attr(tooltip); /* magic! */

        /* most of the rest of this is opinion */
        font-family: Helvetica, sans-serif;
        text-align: left;
        font-size: 15px;
        /*
          Let the content set the size of the tooltips
          but this will also keep them from being obnoxious
          */
        min-width: 30em;
        max-width: 50em;
        /*min-height: 10em;*/
        /*white-space: nowrap;*/
        /*white-space: nowrap;*/
        overflow: visible;
        /*text-overflow: ellipsis;*/
        padding: 1ch 1.5ch;
        border-radius: .3ch;
        box-shadow: 0 1em 2em -.5em rgba(0, 0, 0, 0.35);
        background: #333;
        color: #fff;
        z-index: 1000; /* absurdity 2 */
    }

    /* Make the tooltips respond to hover */
    [tooltip]:hover::before,
    [tooltip]:hover::after {
        display: block;
    }

    /* don't show empty tooltips */
    [tooltip='']::before,
    [tooltip='']::after {
        display: none !important;
    }

    /* FLOW: RIGHT */
    [tooltip][flow^="right"]::before {
        top: 50%;
        border-left-width: 0;
        border-right-color: #333;
        right: calc(0em - 5px);
        transform: translate(.5em, -50%);
    }
    [tooltip][flow^="right"]::after {
        top: 50%;
        left: calc(100% + 5px);
        transform: translate(.5em, -50%);
    }

    /* KEYFRAMES */
    /*@keyframes tooltips-vert {*/
    /*    to {*/
    /*        opacity: .9;*/
    /*        transform: translate(-50%, 0);*/
    /*    }*/
    /*}*/

    @keyframes tooltips-horz {
        to {
            opacity: .9;
            transform: translate(0, -50%);
        }
    }

    /* FX All The Things */
    [tooltip][flow^="right"]:hover::before,
    [tooltip][flow^="right"]:hover::after {
        animation: tooltips-horz 300ms ease-out forwards;
    }
</style>



