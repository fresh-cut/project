@extends('template')
@section('main-content')

    @section('title')
        Business services in {{ $locality->name }}. Opening hours, driving directions, services and customer reviews
    @endsection
    @section('description')
        Full information about Business services in
        {{ $locality->name }}.Find the nearest location, opening hours and driving diections. Customer reviews and available services.
    @endsection


<div class="l-drus-main__article">
    <article class="l-drus-article">
        <header class="l-drus-article__header">
            <h1 class="l-drus-article__h1">
                All Business services in {{ $locality->name }}, United States
            </h1>
            <p class="l-drus-article__header-text">
                Full information about Business services in {{ $locality->name }}.<br>
                Many Business services in {{ $locality->name }} are conveniently located near you. Find the nearest location! Get driving directions for every Business services location in {{ $locality->name }}. Write a review to rate Business services. Get customer phone numbers, opening hours for every Business services in {{ $locality->name }}.
            </p>

            <section class="l-drus-article__section l-drus-article__section--ads">
                @include('includes.adaptive')
            </section>
            @if($items && $items->count())
                <section class="l-drus-article__section">
                    <h2 class="l-drus-article__h2">
                        Popular business services in {{ $locality->name }}
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
