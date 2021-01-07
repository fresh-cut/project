@extends('admin.adminTemplate')
@section('title')
    Правки компании {{($item->type=='edit')?$old_item->name:$item->name }}
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
                            <form action="{{ route('admin.offers-companies.update', $item->id) }}" method="post">
                                @csrf
                                @method('PATCH')
                                @if($item->type=='edit')
                                    <input type="hidden" name="type" value="edit">
                                @else
                                    <input type="hidden" name="type" value="add">
                                @endif
                                <input type="hidden" name="company_id" value="{{$item->company_id}}">
                                <div class="form-group" >
                                    <label for="name">Название</label>
                                    <input type="text"  class="form-control" id="name" name="name" value="{{ old('name', $item->name) }}" autocomplete="off" required>
                                </div>

                                <div class="form-group">
                                    <label for="searchcategory">Категория</label>
                                    <input type="text" class="form-control" id="searchcategory" name="category_name" value="{{ old('category_name', $item->category_name) }}" autocomplete="off" required>
                                </div>

                                <div class="form-group">
                                    <label for="searchregion">Регион</label>
                                    <input type="text" class="form-control" id="searchregion" name="region_name" value="{{ old('region_name', $item->region_name) }}" autocomplete="off" required>
                                </div>

                                <div class="form-group">
                                    <label for="searchlocality">Город</label>
                                    <input type="text" class="form-control" id="searchlocality" name="locality_name" value="{{ old('locality_name', $item->locality_name) }}" autocomplete="off" required>
                                </div>

                                <div class="form-group">
                                    <label for="streetaddress">Адресс</label>
                                    <input type="text" class="form-control" id="streetaddress" name="streetaddress" value="{{ old('streetaddress', $item->streetaddress) }}" autocomplete="off" required>
                                </div>

                                    <div class="form-group">
                                        <label for="latitude">Широта</label>
                                        <input type="text" class="form-control" id='latitude' name="latitude" value="{{ old('latitude', $item->latitude) }}" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="longitude">Долгота</label>
                                        <input type="text" class="form-control" id="longitude" name="longitude" value="{{ old('longitude', $item->longitude) }}" required>
                                    </div>

                                    <div class="form-group">
                                        <button type="button" class="btn btn-secondary js_geo__btn">Сгенерировать</button>
                                    </div>

                                <div class="form-group">
                                    <label for="postalcode">Почтовый индекс</label>
                                    <input type="text" class="form-control" id="postalcode" name="postalcode" value="{{ old('postalcode', $item->postalcode) }}" autocomplete="off" required>
                                </div>

                                <div class="form-group">
                                    <label for="telephone">Телефон</label>
                                    <input type="text" class="form-control" id="telephone" name="telephone" value="{{ old('telephone', $item->telephone) }}" autocomplete="off" required>
                                </div>

                                <div class="form-group">
                                    <label for="website">Сайт</label>
                                    <input type="text" class="form-control" id="website" name="website" value="{{ old('website', $item->website) }}" autocomplete="off" required>
                                </div>
                                <div class="form-group">
                                    <div class="form-check">
                                        <label><input type="radio" name="follow" value="0"
                                                      <?=($item->type=='add')?'checked':''?>
                                            <?=($item->type=='edit' && $old_item->follow==0)?'checked':''?> > Текстовая</label>
                                        <label><input type="radio" name="follow" value="1"
                                            <?=($item->type=='edit' && $old_item->follow==1)?'checked':''?>> Follow</label>
                                        <label><input type="radio" name="follow" value="2"
                                            <?=($item->type=='edit' && $old_item->follow==2)?'checked':''?>> Nofollow</label>
                                    </div>
                                </div>



                                <div class="form-group">
                                    <label for="descr">Описание</label>
                                    <textarea name="descr" class="form-control" style="height: auto;" rows="10" required>{{old('descr', $item->descr)}}</textarea>
                                </div>


                                <div class="form-group">
                                    <label for="user-comment">Коментарий пользователя</label>
                                    <textarea name="user-comment" class="form-control" style="height: auto;" rows="10" disabled>{{ $item->edit}}</textarea>
                                </div>

                                <div class="form-group">
                                    <button class="btn btn-dark" type="submit"><?= ($item->type=='edit')?'Принять изменения':'Добавить компанию'?></button>
                                </div>

                            </form>
                            <form action="{{ route('admin.offers-companies.destroy', $item->id) }}" method="post">
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
                                    <div class="form-group" >
                                        <label for="old_name">Название</label>
                                        <input type="text"  class="form-control" id="old_name" name="old_name" value="{{ $old_item->name }}" disabled>
                                    </div>

                                    <div class="form-group">
                                        <label for="old_category_name">Категория</label>
                                        <input type="text" class="form-control" id="old_category_name" name="old_category_name" value="{{  $old_item->category_name }}" disabled>
                                    </div>

                                    <div class="form-group">
                                        <label for="old_region_name">Регион</label>
                                        <input type="text" class="form-control" id="old_region_name" name="old_region_name" value="{{ $old_item->region_name }}" disabled>
                                    </div>

                                    <div class="form-group">
                                        <label for="old_locality_name">Город</label>
                                        <input type="text" class="form-control" id="old_locality_name" name="old_locality_name" value="{{ $old_item->locality_name }}" disabled>
                                    </div>

                                    <div class="form-group">
                                        <label for="old_streetaddress">Адресс</label>
                                        <input type="text" class="form-control" id="old_streetaddress" name="old_streetaddress" value="{{  $old_item->streetaddress }}" disabled>
                                    </div>

                                    <div class="form-group">
                                        <label for="old_postalcode">Почтовый индекс</label>
                                        <input type="text" class="form-control" id="old_postalcode" name="old_postalcode" value="{{ $old_item->postalcode }}" disabled>
                                    </div>

                                    <div class="form-group">
                                        <label for="old_telephone">Телефон</label>
                                        <input type="text" class="form-control" id="old_telephone" name="old_telephone" value="{{  $old_item->telephone }}" disabled>
                                    </div>

                                    <div class="form-group">
                                        <label for="old_website">Сайт</label>
                                        <input type="text" class="form-control" id="old_website" name="old_website" value="{{ $old_item->website }}" disabled>
                                    </div>

                                    <div class="form-group">
                                        <label for="old_descr">Описание</label>
                                        <textarea name="old_descr" class="form-control" style="height: auto;" rows="10" disabled>{{ $old_item->descr }}</textarea>
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
</script>
            <script>
                $('.js_geo__btn').on('click', function () {
                    var locality = $('#searchlocality').val();
                    var address = $('#streetaddress').val() + ', ' + locality;
                    console.log(address);
                    geocode(address);
                    function geocode(query){
                        $.ajax({
                            url: 'https://api.opencagedata.com/geocode/v1/json',
                            method: 'GET',
                            data: {
                                'key': '<?=settings('maps_key')?>',
                                // 'key': '27d679c3822a4851be2c4b36ecfc3199',
                                'q': query,
                                'no_annotations': 1
                                // see other optional params:
                                // https://opencagedata.com/api#forward-opt
                            },
                            dataType: 'json',
                            statusCode: {
                                200: function(response){  // success
                                    console.log(response.results[0].geometry.lat);
                                    console.log(response.results[0].geometry.lng);
                                    $('#latitude').val(response.results[0].geometry.lat);
                                    $('#longitude').val(response.results[0].geometry.lng);
                                },
                                402: function(){
                                    alert('hit free trial daily limit');
                                    console.log('become a customer: https://opencagedata.com/pricing');
                                },
                                401: function(){
                                    alert('Ключ maps_key отсуствует или недействительный');
                                }
                            }
                        });
                    }

                });
            </script>


@endsection


