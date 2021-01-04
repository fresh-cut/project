@extends('template')
@section('main-content')

    @section('title')
        <?php $str=settings('locality-title-text', 'Business services in { $locality->name }. Opening hours, driving directions, services and customer reviews');
                echo str_replace('{ $locality->name }', $locality->name, $str);
        ?>
    @endsection
    @section('description')
        <?php $str=settings('locality-description-text', 'Full information about Business services in { $locality->name }. Find the nearest location, opening hours and driving diections. Customer reviews and available services.');
            echo str_replace('{ $locality->name }', $locality->name, $str);
        ?>
    @endsection


<div class="l-drus-main__article">
    <article class="l-drus-article">
        <header class="l-drus-article__header">
            <h1 class="l-drus-article__h1">
                <?php $str=settings('locality-head-text','All Business services in { $locality->name }, United States');
                        echo str_replace('{ $locality->name }', $locality->name, $str);
                ?>
            </h1>
            <p class="l-drus-article__header-text">
                <?php $str=settings('locality-after-head-text','Full information about Business services in { $locality->name }.<br>Many Business services in { $locality->name } are conveniently located near you. Find the nearest location! Get driving directions for every Business services location in { $locality->name }. Write a review to rate Business services. Get customer phone numbers, opening hours for every Business services in { $locality->name }.');
                        echo str_replace('{ $locality->name }', $locality->name, $str);
                ?>
            </p>

            <section class="l-drus-article__section l-drus-article__section--ads">
                @include('includes.ads.ads-four')
            </section>
            @if($items && $items->count())
                <section class="l-drus-article__section">
                    <h2 class="l-drus-article__h2">
                        <?php echo settings('locality-popular-service-text', 'Popular business services in')?> {{ $locality->name }}
                    </h2>
                    @include('includes.list-items')
                </section>
        @endif
        </header>
    </article>
</div>
@include('includes.aside')
@endsection
