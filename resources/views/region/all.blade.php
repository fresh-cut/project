@extends('template')
@section('main-content')
        @section('title')
            <?php echo settings_translate('allStates_title_text', 'List of Business services in the United States near me: Opening hours, phone numbers, driving directions and customer reviews')?>
        @endsection
        @section('description')<?php echo settings_translate('allStates_description_text','Business services the most complete and current list. Contact information, addresses and phone numbers, opening hours  in all United States cities. Customer Reviews and ratings of popularity Business services.')?> @endsection

    <div class="l-drus-main__article">
        <article class="l-drus-article">
            <header class="l-drus-article__header">
                <h1 class="l-drus-article__h1">
                    <?php echo settings_translate('allStates_head_text','All Business services in the United States by cities')?>
                </h1>
                <p class="l-drus-article__header-text">
                    <?php echo settings_translate('allStates_after_head_text','Business services in the United States is the most complete and current list. Contact information, addresses and phone numbers, opening hours of stores in all United States cities. Customer Reviews and ratings of popularity Business services.<br>Many Business services services in United States are conveniently located near you. Find the nearest location! Get driving directions for every Business services location i. Write a review to rate this services. Get customer phone numbers, opening hours for every services.')?>
                </p>


                <section class="l-drus-article__section l-drus-article__section--ads">
                    @include('includes.ads.ads-four')
                </section>

            @if($regions && $regions->count())
            <section class="l-drus-article__section l-drus-article__section--white">

                <ul class="c-drus-list">
                    @foreach($regions as $region)
                    <li class="c-drus-list__item c-drus-list__item--4">
                        <a href="{{ route('region', $region->url) }}"
                           class="c-drus-list__link c-drus-list__link--nav"
                           title="Business services in {{$region->name}}">
                            {{$region->name}}</a>
                    </li>
                     @endforeach
                </ul>
            </section>
            @endif
        </header>
        </article>
    </div>
    @include('includes.aside')
@endsection
