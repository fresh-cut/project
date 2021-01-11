@extends('template')
@section('main-content')

@section('title')
    <?php echo settings_translate('updatePage_title_text', 'Suggest an update')?>  {{ $company->name }}
@endsection
@section('description')<?php echo settings_translate('updatePage_description_text', 'Suggest an update')?>  {{ $company->name }} @endsection

<div class="l-drus-main__article">
    <article class="l-drus-article">
        <div class="l-drus-article__two l-drus-article__two--reverse">
            <div class="l-drus-article__two-first l-drus-article__two-first--reverse">
                <section class="l-drus-article__section l-drus-article__section--white">
                    @if($errors->any())
                        <div style="border: 1px solid red; border-radius: 2px; margin-bottom: 10px; padding: 5px">
                            @include('includes.result_messages')
                        </div>
                    @endif
                        <h2 class="l-drus-article__h2">
                            <?php echo settings_translate('updatePage_head_text', 'Suggest an update')?>
                        </h2>
                        <form method="post" action="{{ route('editstore-company', [$company->region_url, $company->locality_url, $company->url]) }}" class="c-drus-form">
                            @csrf
                            <input type="hidden" name="company_id" value="{{ $company->id }}">
                            <input type="hidden" name="url" value="{{ $company->url }}">
                            <input type="hidden" name="region_url" value="{{ $company->region_url }}">
                            <input type="hidden" name="locality_url" value="{{ $company->locality_url }}">
                            <input type="hidden" name="latitude" value="{{ $company->latitude }}">
                            <input type="hidden" name="longitude" value="{{ $company->longitude }}">
                            <label class="c-drus-form__label">
                                Name*
                                <input type="text" name="name" class="c-drus-form__input" value="{{ old('name', $company->name) }}" required>
                            </label>

                            <label class="c-drus-form__label">
                                Categories*
                                <input type="text" class="c-drus-form__input" id="searchcategory" name="category_name"
                                       value="{{ old('category_name', $company->category_name) }}" required>
                            </label>

                            <label class="c-drus-form__label">
                                State*
                                <input type="text" name="region_name" id="searchregion" class="c-drus-form__input"
                                       value="{{ old('region_name', $company->region_name) }}" required>
                            </label>

                            <label class="c-drus-form__label">
                                Locality*
                                <input type="text" name="locality_name" id="searchlocality" class="c-drus-form__input"
                                       value="{{ old('locality_name', $company->locality_name) }}" required>
                            </label>

                            <label class="c-drus-form__label">
                                ZIP*
                                <input type="text" name="postalcode" class="c-drus-form__input" value="{{ old('postalcode', $company->postalcode) }}"
                                       required>
                            </label>

                            <label class="c-drus-form__label">
                                Street address*
                                <input type="text" name="streetaddress" class="c-drus-form__input"
                                       value="{{ old('streetaddress', $company->streetaddress) }}" required>
                            </label>

                            <label class="c-drus-form__label">
                                Phone*
                                <input type="text" name="telephone" class="c-drus-form__input"
                                       value="{{ old('telephone', $company->telephone) }}" required>
                            </label>

                            <label class="c-drus-form__label">
                                Website*
                                <input type="text" name="website" class="c-drus-form__input" required
                                       value="{{ old('website', urldecode($company->website)) }}">
                            </label>

                            <label class="c-drus-form__label">
                                Company description*
                                <textarea name="descr" class="c-drus-form__input" style="height: auto;" rows="7" required>{{old('descr', $company->descr)}}</textarea>
                            </label>

                            <label class="c-drus-form__label">
                                Your comments* (not for publishing)
                                <textarea required name="edit" class="c-drus-form__input" style="height: auto;" rows="7">{{old('edit','')}}</textarea>
                            </label>

                            <label class="c-drus-form__label">
                                {!! app('captcha')->display() !!}
                            </label>

                            <label class="c-drus-form__label">
                                <sup>*</sup> &mdash; <?php echo settings_translate('updatePage_required_text', 'Required information')?>
                            </label>

                            <label class="c-drus-form__label">
                                <input type="submit" class="c-drus-form__input c-drus-form__input--submit" value="<?php echo settings_translate('updatePage_button_text', 'Send')?>">
                            </label>

                        </form>
                </section>

            </div>

            <div class="l-drus-article__two-second">

                <h1 class="l-drus-article__h1">
                    {{ $company->name }}
                </h1>


                <p><a href="{{ route('company', [$company->region_url, $company->locality_url, $company->url]) }}">&larr; View details</a></p>


                <p>
                    {{ ($company->streetaddress) ? $company->streetaddress. ', ' : '' }}
                    {{ $company->locality_name}},
                    {{ $company->region_name }}
                    <?= ($company->postalcode)? $company->postalcode : '' ?>
                </p>

                @if(isset($company->telephone))
                    <p >
                        {{$company->telephone}}
                    </p>
                @endif

            </div>
        </div>


    </article>
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


{!! NoCaptcha::renderJs()  !!}
@endsection

