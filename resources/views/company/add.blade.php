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
                        <form action="{{ route('listing-store') }}" method="post" class="c-drus-form">
                            @csrf
                            <label class="c-drus-form__label">
                                Name*
                                <input type="text" name="name" class="c-drus-form__input" required>
                            </label>
                            <label class="c-drus-form__label">
                                Categories*
                                <input class="typeahead c-drus-form__input" type="text" required>
                            </label>

                            <label class="c-drus-form__label">
                                State*
                                <input type="text" name="region" class="c-drus-form__input" required>
                            </label>



                            <label class="c-drus-form__label">

                                Locality*

                                <input type="text" name="locality" class="c-drus-form__input" required>

                            </label>



                            <label class="c-drus-form__label">

                                ZIP*

                                <input type="number" name="zip" class="c-drus-form__input" required>

                            </label>



                            <label class="c-drus-form__label">
                                Street address*
                                <input type="text" name="address" class="c-drus-form__input" required>
                            </label>
                            <label class="c-drus-form__label">
                                Phone*
                                <input type="text" name="phone" class="c-drus-form__input" required>
                            </label>



                            <label class="c-drus-form__label">
                                Website
                                <input type="text" name="website" class="c-drus-form__input">
                            </label>

                            <label class="c-drus-form__label">
                                Company description
                                <textarea name="description" class="c-drus-form__input" style="height: auto;" rows="7"></textarea>
                            </label>

                            <label class="c-drus-form__label">
                                Your comments (not for publishing)
                                <textarea name="comments" class="c-drus-form__input" style="height: auto;" rows="7"></textarea>
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
    var path = "{{ route('autocomplete') }}";
    $('input.typeahead').typeahead({
        source:  function (query, process) {
            return $.get(path, { query: query }, function (data) {
                return process(data);
            });
        }
    });
</script>
    <script async src="//www.google.com/recaptcha/api.js"></script>
@endsection
