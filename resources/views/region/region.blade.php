@extends('template')
@section('main-content')
    @section('title')
        <?php $str=settings_translate('region_title_text','Business services locations in { $region->name } near me. Opening hours, driving directions, services and customer reviews');
                echo str_replace('{ $region->name }', $region->name, $str);
        ?>
    @endsection
    @section('description')<?php $str=settings_translate('region_description_text','Full information about business services locations in { $region->name }. Find the nearest location, opening hours and driving diections. Customer reviews and available services.');
            echo str_replace('{ $region->name }', $region->name, $str);?> @endsection

    <div class="l-drus-main__article">
        <article class="l-drus-article">
            <header class="l-drus-article__header">
                <h1 class="l-drus-article__h1">
                    <?php $str=settings_translate('region_head_text','All Business services in { $region->name }, United States by cities');
                            echo str_replace('{ $region->name }', $region->name, $str);
                    ?>
                </h1>

                <p class="l-drus-article__header-text">
                    <?php $str=settings_translate('region_after_head_text', 'Full information about business services locations in { $region->name }.They are conveniently located near you. Get driving directions for every  location in { $region->name }. Write a review to rate. Get customer phone numbers, opening hours for every business services in { $region->name }.');
                    echo str_replace('{ $region->name }', $region->name, $str);
                    ?>
                </p>


            <section class="l-drus-article__section l-drus-article__section--ads">
                @include('includes.ads.ads-four')
            </section>

            @if(isset($localities) && $localities->count())
            <section class="l-drus-article__section l-drus-article__section--white">
                <h2 class="l-drus-article__h2">
                    <?php $str=settings_translate('region_popular_cities_text','Popular  cities in { $region->name }, where there are business services');
                    echo str_replace('{ $region->name }', $region->name, $str);
                    ?>
                </h2>
                <ul class="c-drus-list">
                    @foreach($localities as $locality)
                    <li class="c-drus-list__item c-drus-list__item--4">
                        <a href="{{ route('city', $locality->url) }}"
                           class="c-drus-list__link c-drus-list__link--nav"
                           title="Business services in {{$locality->name}}">
                            {{$locality->name}}</a>
                    </li>
                     @endforeach
                </ul>
            </section>
            @endif
                @if(isset($region_reviews) && $region_reviews->count())
                <section class="l-drus-article__section l-drus-article__section--white">

                    <h2 class="l-drus-article__h2">
                        <?php echo settings_translate('region_latest_review_text', 'Latest reviews about the United States business services in').' '?> {{ $region->name }}
                    </h2>

                    <ul class="c-drus-list">
                        @foreach($region_reviews as $review)
                            <li class="c-drus-list__item c-drus-review">
                                <div class="c-drus-review__line c-drus-review__line--small">
                                    <a href="{{ route('company', [$review->region_url, $review->locality_url, $review->url]) }}">Review
                                        of "{{ $review->name }}" at {{ $review->locality_name }}</a>
                                </div>
                                <div class="c-drus-review__line">
                                    {{ $review->review_comment }}
                                </div>
                                <div class="c-drus-review__line c-drus-review__line--small">
                                    <div class="c-drus-review__date">
                                        By {{ $review->reviewer_name }}, {{ $review->review_data }}
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </section>
                @endif

            @if(isset($items) && $items->count())
            <section class="l-drus-article__section">
                @include('includes.list-items')
            </section>
            @endif
        </header>
        </article>
    </div>
    @include('includes.aside')
@endsection
