@extends('admin.adminTemplate')
@section('title')
    Редактировать компанию {{ $company->name }}
@endsection
@section('content')
            <h1>Редактирование компании</h1>
            <div class="form-group">
                <a href="{{ route('admin.company.index') }}" class="btn btn-secondary ">назад</a>
            </div>
            <div class="row">
            <div class="col-md-8">
                @include('admin.includes.result_messages')
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('admin.company.update', $company->id) }}" method="post">
                            @csrf
                            @method('PATCH')
                            <div class="form-group" >
                                <label for="id">ID</label>
                                <input type="text" class="form-control" id="id" value="{{$company->id }}" disabled>
                            </div>
                            <div class="form-group" >
                                <label for="name">Название</label>
                                <input type="text"  class="form-control" id="name" name="name" value="{{ old('name',$company->name) }}" required autocomplete="no">
                            </div>
                            <div class="form-group">
                                <label for="searchcategory">Категория</label>
                                <input type="text" class="form-control" id="searchcategory" name="category_name" value="{{ old('category_name', $company->category_name) }} " required autocomplete="no">
                            </div>

                            <div class="form-group">
                                <label for="searchregion">Регион</label>
                                <input type="text" class="form-control" id="searchregion" name="region_name" value="{{ old('region_name',$company->region_name) }}" required autocomplete="no">
                            </div>

                            <div class="form-group">
                                <label for="searchlocality">Город</label>
                                <input type="text" class="form-control" id="searchlocality" name="locality_name" value="{{ old('locality_name',$company->locality_name) }}" required autocomplete="aaa">
                            </div>

                            <div class="form-group">
                                <label for="streetaddress">Адрес (без слова "улица" и всех его сокращений)</label>
                                <input type="text" class="form-control" id="streetaddress" name="streetaddress" value="{{  old('streetaddress',$company->streetaddress) }}" required autocomplete="no">
                            </div>

                            <div class="form-group">
                                <label for="latitude">Широта</label>
                                <input type="text" class="form-control" id='latitude' name="latitude" value="{{ old('latitude', $company->latitude) }}" required autocomplete="no">
                            </div>

                            <div class="form-group">
                                <label for="longitude">Долгота</label>
                                <input type="text" class="form-control" id="longitude" name="longitude" value="{{ old('longitude', $company->longitude) }}" required autocomplete="no">
                            </div>

                            <div class="form-group">
                                <button type="button" class="btn btn-secondary js_geo__btn">Сгенерировать</button>
                            </div>

                            <div class="form-group">
                                <label for="postalcode">Почтовый индекс</label>
                                <input type="text" class="form-control" id="postalcode" name="postalcode" value="{{ old('postalcode', $company->postalcode) }}" required autocomplete="no">
                            </div>

                            <div class="form-group">
                                <label for="telephone">Телефон</label>
                                <input type="text" class="form-control" id="telephone" name="telephone" value="{{  old('telephone',$company->telephone) }}" required autocomplete="no">
                            </div>

                            <div class="form-group">
                                <label for="website">Сайт</label>
                                <input type="text" class="form-control" id="website" name="website" value="{{ old('website',$company->website) }}" required autocomplete="no">
                            </div>

                            <div class="form-group">
                                <div class="form-check">
                                    <label><input type="radio" name="follow" value="0"
                                            <?=($company->follow==0)?'checked':''?> > Текстовая</label>
                                    <label><input type="radio" name="follow" value="1"
                                        <?=($company->follow==1)?'checked':''?>> Follow</label>
                                    <label><input type="radio" name="follow" value="2"
                                        <?=($company->follow==2)?'checked':''?>> Nofollow</label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="descr">Описание</label>
                                <textarea name="descr" class="form-control" style="height: auto;" rows="10" required>{{ old('descr',$company->descr) }}</textarea>
                            </div>

                            <div class="form-group">
                                <button class="btn btn-dark" type="submit">Сохранить</button>
                            </div>
                        </form>
                        <form action="{{ route('admin.company.destroy', $company->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger">Удалить компанию</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        Ссылка на компанию:
                        <a href="{{ route('company',[$company->region_url, $company->locality_url, $company->url]) }}"
                           target="_blank">{{$company->name}}</a>
                    </div>
                </div>
            </div>
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
