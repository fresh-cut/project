@extends('template')
@section('main-content')
{{--    <meta>--}}
{{--        <title>--}}
{{--            Add listing--}}
{{--        </title>--}}
{{--        <description>--}}
{{--            Add listing--}}
{{--        </description>--}}
{{--    </meta>--}}
    <div class="l-drus-main__article">
        <article class="l-drus-article">
            <div class="l-drus-article__two l-drus-article__two--reverse">
                <div class="l-drus-article__two-first l-drus-article__two-first--reverse">
                    <section class="l-drus-article__section l-drus-article__section--white">
                        <h2 class="l-drus-article__h2">
                            Add listing
                        </h2>
                        <form action="{{ route('addstore-company') }}" method="post" class="c-drus-form">
                            @csrf
                            <label class="c-drus-form__label">
                                Name*
                                <input type="text" name="name" class="c-drus-form__input" value="{{ old('name', '') }}" required>
                            </label>
                            <label class="c-drus-form__label">
                                Categories*
                                <input type="text" class="c-drus-form__input" id="searchcategory" name="category_name"
                                       value="{{ old('category_name','') }}" required>
                            </label>

                            <label class="c-drus-form__label">
                                State*
                                <input type="text" name="region_name" id="searchregion" class="c-drus-form__input"
                                       value="{{ old('region_name', '') }}" required>
                            </label>

                            <label class="c-drus-form__label">
                                Locality*
                                <input type="text" name="locality_name" id="searchlocality" class="c-drus-form__input"
                                       value="{{ old('locality_name', '') }}" required>
                            </label>

                            <label class="c-drus-form__label">
                                ZIP*
                                <input type="text" name="postalcode" class="c-drus-form__input" value="{{ old('postalcode', '')}}" required>

                            </label>

                            <label class="c-drus-form__label">
                                Street address*
                                <input type="text" name="streetaddress" class="c-drus-form__input"
                                       value="{{ old('streetaddress', '') }}" required>
                            </label>
                            <label class="c-drus-form__label">
                                Phone*
                                <input type="text" name="telephone" class="c-drus-form__input"
                                       value="{{ old('telephone', '') }}" required>
                            </label>

                            <label class="c-drus-form__label">
                                Website*
                                <input type="text" name="website" class="c-drus-form__input" required
                                        value="{{ old('website', '') }}">
                            </label>

                            <label class="c-drus-form__label">
                                Company description*
                                <textarea name="descr" class="c-drus-form__input" style="height: auto;" rows="7" required>{{old('descr', '')}}</textarea>
                            </label>

                            <label class="c-drus-form__label">
                                Your comments* (not for publishing)
                                <textarea required name="edit" class="c-drus-form__input" style="height: auto;" rows="7">{{old('edit','')}}</textarea>
                            </label>

                            <label class="c-drus-form__label">
                                <div class="g-recaptcha" data-sitekey="6Ldcc3MUAAAAABUGbNvU6VUzhG993Q5wPoGWSMjz"></div>
                            </label>


                            <label class="c-drus-form__label">
                                <sup>*</sup> &mdash; Required information
                            </label>

                            <label class="c-drus-form__label">
                                <input type="submit" class="c-drus-form__input c-drus-form__input--submit" value="Send">
                            </label>
                        </form>

                    </section>
                </div>
                <div class="l-drus-article__two-second">
                    &nbsp;
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
    <script async src="//www.google.com/recaptcha/api.js"></script>
@endsection
