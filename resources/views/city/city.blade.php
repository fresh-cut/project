@extends('template')
@section('main-content')

    @section('title')
        <?php $str=settings_translate('locality_title_text', 'Business services in { $locality->name }. Opening hours, driving directions, services and customer reviews');
                echo str_replace('{ $locality->name }', $locality->name, $str);
        ?>
    @endsection
    @section('description')<?php $str=settings_translate('locality_description_text', 'Full information about Business services in { $locality->name }. Find the nearest location, opening hours and driving diections. Customer reviews and available services.');
            echo str_replace('{ $locality->name }', $locality->name, $str);?> @endsection


<div class="l-drus-main__article">
    <article class="l-drus-article">
        <header class="l-drus-article__header">
            <h1 class="l-drus-article__h1">
                <?php $str=settings_translate('locality_head_text','All Business services in { $locality->name }, United States');
                        echo str_replace('{ $locality->name }', $locality->name, $str);
                ?>
            </h1>
            <p class="l-drus-article__header-text">
                <?php $str=settings_translate('locality_after_head_text','Full information about Business services in { $locality->name }.<br>Many Business services in { $locality->name } are conveniently located near you. Find the nearest location! Get driving directions for every Business services location in { $locality->name }. Write a review to rate Business services. Get customer phone numbers, opening hours for every Business services in { $locality->name }.');
                        echo str_replace('{ $locality->name }', $locality->name, $str);
                ?>
            </p>

            <section class="l-drus-article__section l-drus-article__section--ads">
                @include('includes.ads.ads-four')
            </section>
            @if($items && $items->count())
                <section class="l-drus-article__section">
                    <h2 class="l-drus-article__h2">
                        <?php echo settings_translate('locality_popular_service_text', 'Popular business services in')?> {{ $locality->name }}
                    </h2>
                    @include('includes.list-items')
                </section>
        @endif
        </header>
    </article>
</div>
@include('includes.aside')
@endsection
