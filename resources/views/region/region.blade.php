@extends('template')
@section('main-content')
    @section('title')
        <?php $str=settings('region-title-text','Business services locations in { $region->name } near me. Opening hours, driving directions, services and customer reviews');
                echo str_replace('{ $region->name }', $region->name, $str);
        ?>
    @endsection
    @section('description')
        <?php $str=settings('region-description-text','Full information about business services locations in { $region->name }. Find the nearest location, opening hours and driving diections. Customer reviews and available services.');
            echo str_replace('{ $region->name }', $region->name, $str);
        ?>
    @endsection

    <div class="l-drus-main__article">
        <article class="l-drus-article">
            <header class="l-drus-article__header">
                <h1 class="l-drus-article__h1">
                    <?php $str=settings('region-head-text','All Business services in { $region->name }, United States by cities');
                            echo str_replace('{ $region->name }', $region->name, $str);
                    ?>
                </h1>

                <p class="l-drus-article__header-text">
                    <?php $str=settings('region-after-head-text', 'Full information about business services locations in { $region->name }.They are conveniently located near you. Get driving directions for every  location in { $region->name }. Write a review to rate. Get customer phone numbers, opening hours for every business services in { $region->name }.');
                    echo str_replace('{ $region->name }', $region->name, $str);
                    ?>
                </p>


            <section class="l-drus-article__section l-drus-article__section--ads">
                @include('includes.ads.ads-four')
            </section>

            @if(isset($localities) && $localities->count())
            <section class="l-drus-article__section l-drus-article__section--white">
                <h2 class="l-drus-article__h2">
                    Popular  cities in {{ $region->name }}, where there are business services
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


            @if(isset($items) && $items->count())
            <section class="l-drus-article__section">
                <h2 class="l-drus-article__h2">
                    <?php echo settings('region-popular-service-text', 'Popular business services in').' '?> {{ $region->name }}
                </h2>
                @include('includes.list-items')
            </section>
            @endif
        </header>
        </article>
    </div>
    @include('includes.aside')
@endsection
