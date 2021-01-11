@extends('template')
@section('main-content')

@section('title')
    <?php echo settings_translate('reviewPage_title_text', 'Write a review about')?> {{ $company->name }}
@endsection
@section('description')<?php echo settings_translate('reviewPage_description_text', 'Write a review about')?>  {{ $company->name }}@endsection

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
                        <?php echo settings_translate('reviewPage_head_text', 'Write a review')?>
                    </h2>
                    <form method="post" action="{{ route('store-review', [$company->region_url, $company->locality_url, $company->url]) }}" class="c-drus-form">
                        @csrf
                        <label class="c-drus-form__label">
                            Your name<sup>*</sup>
                            <input type="text" name="name" class="c-drus-form__input" value="{{ old('name', '') }}" required>
                        </label>
                        <label class="c-drus-form__label">
                            Your e-mail<sup>*</sup>
                            <small>(Not for publication)</small>
                            <input type="email" name="email" class="c-drus-form__input" value="{{ old('email', '') }}" required>
                        </label>
                        <label class="c-drus-form__label">
                            Your review <sup>*</sup>
                            <textarea name="review" class="c-drus-form__input" rows="7"  style="height: auto;" required>{{ old('review', '') }}</textarea>
                        </label>

                        <input type="hidden" name="company_id" value="{{ $company->id }}">
                        <input type="hidden" name="company_name" value="{{ $company->name }}">

                        <label class="c-drus-form__label">
                            <div class="g-recaptcha"
                                 data-sitekey="{{settings('google_recapcha_site_key')}}"></div>
                        </label>

                        <label class="c-drus-form__label">
                            <sup>*</sup> &mdash; <?php echo settings_translate('reviewPage_required_text', 'Required information')?>
                        </label>

                        <label class="c-drus-form__label">
                            <input type="submit" class="c-drus-form__input c-drus-form__input--submit" value="<?php echo settings_translate('reviewPage_button_text', 'Add a review')?>">
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

<script async src="//www.google.com/recaptcha/api.js"></script>


@endsection

