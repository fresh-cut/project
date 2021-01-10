@extends('template')
@section('main-content')
@section('title')
    <?php echo settings_translate('title_text', env('APP_NAME'))?>
@endsection
@section('description')<?php echo settings_translate('description_text','This is '.env('APP_NAME'))?> @endsection
<div class="l-drus-main__article">
    <article class="l-drus-article">
        <header class="l-drus-article__header" style="text-align: center;">
            <h1 class="l-drus-article__h1">
                <?php echo settings_translate('head_text', 'All business services in the United States') ?>
            </h1>
            <p class="l-drus-article__header-text">
                <?php echo settings_translate('after_head_text', 'Welcome to our website where you can find all companies and organizations providing business services in the United States') ?>
            </p>

        </header>
        <div class="l-drus-article__section l-drus-article__section--ads">
            @include('includes.ads.ads-one')
        </div>
        <section class="l-drus-article__section">

            <h2 class="l-drus-article__h2" style="text-align: center;">
            <?php echo settings_translate('popular_company_text','Popular business services')?>
            </h2>
            @include('includes.list-items')
        </section>
        <div class="l-drus-article__section l-drus-article__section--ads">
            @include('includes.ads.ads-two')
        </div>
        <section class="l-drus-article__section l-drus-article__section--white">
            <h2 class="l-drus-article__h2" style="text-align: center;">
                <?php echo settings_translate('popular_region_text','Popular states')?>
            </h2>
            <ul class="c-drus-list">
                @foreach($regions as $region)
                    <li class="c-drus-list__item c-drus-list__item--4">
                        <a href="{{ route('region', $region->url) }}"
                           class="c-drus-list__link c-drus-list__link--nav"
                           title="Entertainments in {{ $region->name}}">
                            {{ $region->name}}</a>
                    </li>
                @endforeach
            </ul>
        </section>
        <div class="l-drus-article__section l-drus-article__section--ads">
            @include('includes.ads.ads-three')
        </di    v>
        <section class="l-drus-article__section l-drus-article__section--white">
            <h2 class="l-drus-article__h2" style="text-align: center;">
                <?php echo settings_translate('popular_locality_text','Popular cities')?>
            </h2>
            <ul class="c-drus-list">
                @foreach($localities as $locality)
                <li class="c-drus-list__item c-drus-list__item--4">
                    <a href="{{route('city', $locality->url)}}"
                       class="c-drus-list__link c-drus-list__link--nav"
                       title="Entertainments in {{ $locality->name }}">
                        {{ $locality->name }}</a>
                </li>
                @endforeach
            </ul>
        </section>



        @if($reviews && $reviews->count())
        <section class="l-drus-article__section l-drus-article__section--white">
            <h2 class="l-drus-article__h2" style="text-align: center;">
                <?php echo settings_translate('latest_reviews_text', 'Latest reviews')?>
            </h2>
            @include('includes.list_reviews')
        </section>
        @endif

            @if($urlOther && count($urlOther) )
                <section class="l-drus-article__section" style="margin-bottom: 50px">
                    <h2 class="l-drus-article__h2" style="margin-top:30px;text-align: center;">
                    <?php echo settings_translate('other_catalog_text', 'Catalog in other Countries. Our business directories around world')?>
                    </h2>
                    <div style="width: 80%; margin: auto">

                        <ul class="c-drus-list">
                            @foreach($urlOther as $key=>$value)
                                <li class="c-drus-list__item c-drus-list__item--6 item-center">
                                    <a href="{{ $value }}" target="_blank"
{{--                                       class="c-drus-list__link c-drus-list__link--nav"--}}
                                    >
                                        {{ $key }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                </section>
        @endif
    </article>
</div>
@endsection
