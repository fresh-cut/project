@extends('template')
@section('main-content')

    @section('title')
        <?php $str=settings_translate('category_title_text', '{ $category->name }');
               echo str_replace('{ $category->name }', $category->name, $str);
        ?>
    @endsection
    @section('description')<?php $str=settings_translate('category_description_text', '{ $category->name }');
            echo str_replace('{ $category->name }', $category->name, $str);?> @endsection


<div class="l-drus-main__article">
    <article class="l-drus-article">
        <header class="l-drus-article__header">
            <h1 class="l-drus-article__h1">
                <?php $str=settings_translate('category_head_text','Popular Business services with "{ $category->name }" category in United States');
                        echo str_replace('{ $category->name }', $category->name, $str);
                ?>
            </h1>
            <p class="l-drus-article__header-text">
                <?php $str=settings_translate('category_after_head_text','Many services with "{ $category->name }" category in United States are conveniently located near you. Find the nearest location! Get driving directions for every services with "{ $category->name }" category location in United States. Write a review to rate this services. Get customer phone numbers, opening hours for every services with "{ $category->name }" category in United States.');
                        echo str_replace('{ $category->name }', $category->name, $str);
                ?>
            </p>

            <section class="l-drus-article__section l-drus-article__section--ads">
                @include('includes.ads.ads-four')
            </section>
            @if($items && $items->count())
                <section class="l-drus-article__section">
                    <h2 class="l-drus-article__h2">
                        <?php $str = settings_translate('category_popular_service_text', 'Popular business services with "{ $category->name }" category');
                            echo str_replace('{ $category->name }', $category->name, $str);
                        ?>
                    </h2>
                    @include('includes.list-items')
                </section>
        @endif
        </header>
    </article>
</div>
@include('includes.aside')
@endsection
