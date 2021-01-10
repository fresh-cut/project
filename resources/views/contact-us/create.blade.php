@extends('template')
@section('main-content')
@section('title')
            <?php echo settings_translate('contactPage_title_text', 'Contact us')?>
@endsection
@section('description')<?php echo settings_translate('contactPage_description_text', 'Send message to site administrator')?>@endsection

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
                            <?php echo settings_translate('contactPage_head_text', 'Contact us')?>
                        </h2>
                        <form action="{{ route('store-contact-us') }}" method="post" class="c-drus-form">
                            @csrf
                            <label class="c-drus-form__label">
                                Your name<sup>*</sup>
                                <input type="text" name="name" class="c-drus-form__input" value="{{ old('name', '') }}" required>
                            </label>

                            <label class="c-drus-form__label">
                                Your e-mail<sup>*</sup>
                                <small></small>
                                <input type="email" name="email" class="c-drus-form__input" value="{{ old('email', '') }}" required>
                            </label>

                            <label class="c-drus-form__label">
                                Your message*
                                <textarea name="message" class="c-drus-form__input" rows="7" style="height: auto;" required>{{ old('message', '') }}</textarea>
                            </label>

                            <label class="c-drus-form__label">
                                <div class="g-recaptcha" data-sitekey="{{settings('google_recapcha_site_key')}}"></div>
                            </label>


                            <label class="c-drus-form__label">
                                <sup>*</sup> &mdash; <?php echo settings_translate('contactPage_required_text', 'Required information')?>
                            </label>

                            <label class="c-drus-form__label">
                                <input type="submit" class="c-drus-form__input c-drus-form__input--submit" value="<?php echo settings_translate('contactPage_button_text', 'Send')?>">
                            </label>
                        </form>

                    </section>
                </div>
                <div class="l-drus-article__two-second">
                    @include('includes.aside')
                </div>
            </div>
        </article>
    </div>
    <script async src="//www.google.com/recaptcha/api.js"></script>
@endsection
