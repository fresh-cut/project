@extends('template')
@section('main-content')
    @section('title')
        Business services locations in {{ $region->name }} near me. Opening hours, driving directions, services and customer reviews
    @endsection
    @section('description')
        Full information about business services
        locations in {{ $region->name }}. Find the nearest location, opening hours and driving diections. Customer reviews and available services.
    @endsection

    <div class="l-drus-main__article">
        <article class="l-drus-article">
            <header class="l-drus-article__header">
                <h1 class="l-drus-article__h1">
                    All Business services in {{ $region->name }}, United States by cities
                </h1>

                <p class="l-drus-article__header-text">
                    Full information about business services locations
                    in {{ $region->name }}.They are conveniently located near you. Get driving directions for every  location in {{ $region->name }}. Write a review to rate. Get customer phone numbers, opening hours for every business services in {{ $region->name }}.
                </p>


            <section class="l-drus-article__section l-drus-article__section--ads">
                @include('includes.adaptive')
            </section>

            @if($localities && $localities->count())
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

            <section class="l-drus-article__section l-drus-article__section--ads">
                @include('includes.adaptive')
            </section>


            @if($items && $items->count())
            <section class="l-drus-article__section">
                <h2 class="l-drus-article__h2">
                    Popular business services in {{ $region->name }}
                </h2>
                @include('includes.list-items')
            </section>
            <section class="l-drus-article__section l-drus-article__section--ads">
                @include('includes.adaptive')
            </section>
            @endif
        </header>
        </article>
    </div>
    @include('includes.aside')
@endsection
