@extends('template')
@section('main-content')
<div class="l-drus-main__article">
    <article class="l-drus-article">
        <header class="l-drus-article__header" style="text-align: center;">
            <h1 class="l-drus-article__h1">
                All business services in the United States
            </h1>
            <p class="l-drus-article__header-text">
                Welcome to our website where you can find all companies and organizations providing business services in the United States
            </p>

        </header>
        @include('includes.adaptive')
        <section class="l-drus-article__section">

            <div align="middle">

            </div>
            <h2 class="l-drus-article__h2" style="text-align: center;">
                Popular business services
            </h2>
            @include('includes.list-items')
        </section>
        <section class="l-drus-article__section l-drus-article__section--white">
            <div align="middle">

            </div>
            <h2 class="l-drus-article__h2" style="text-align: center;">
                Popular states
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
        @include('includes.adaptive')
        <section class="l-drus-article__section l-drus-article__section--white">
            <div align="middle">
            </div>
            <h2 class="l-drus-article__h2" style="text-align: center;">
                Popular cities
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
            <div align="middle">
            </div>
            <h2 class="l-drus-article__h2" style="text-align: center;">
                Latest reviews
            </h2>
            @include('includes.list_reviews')
        </section>
        @endif

{{--        <?php if (isset($data['news']) && $data['news']) { ?>--}}
{{--        <section class="l-drus-article__section">--}}

{{--            <h2 class="l-drus-article__h2" style="text-align: center;">--}}
{{--                New articles--}}
{{--            </h2>--}}

{{--            <ul class="c-drus-list">--}}
{{--                <?php foreach ($data['news'] as $news) { ?>--}}
{{--                <li class="c-drus-list__item c-drus-list__item--2">--}}

{{--                    <div class="c-drus-card">--}}
{{--                        <?php if ($news['img']) { ?>--}}
{{--                        <a href="//<?= App::getRouter()->getHostMain() ?>/articles/<?= $news['url'] ?>/"--}}
{{--                           class="c-drus-card__img"--}}
{{--                           style="background-image: url(<?= $news['img'] ?>);"></a>--}}
{{--                        <?php } ?>--}}
{{--                        <div class="c-drus-card__info">--}}
{{--                            <a href="//<?= App::getRouter()->getHostMain() ?>/articles/<?= $news['url'] ?>/"--}}
{{--                               class="c-drus-card__header">--}}
{{--                                <?= $news['header'] ?></a>--}}

{{--                            <p class="c-drus-card__line">--}}
{{--                                <?= $news['description'] ?>--}}
{{--                            </p>--}}

{{--                            <p class="c-drus-card__line c-drus-card__line--small">--}}
{{--                                <?= $news['date'] ?>--}}
{{--                            </p>--}}

{{--                        </div>--}}
{{--                    </div>--}}
{{--                </li>--}}
{{--                <?php } ?>--}}
{{--            </ul>--}}
{{--        </section>--}}
{{--        <?php } ?>--}}


    </article>
</div>
@endsection
