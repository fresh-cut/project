@extends('template')
@section('main-content')
    @section('title')
        {{ $company->name}} in {{ $company->streetaddress }},
        {{ $company->region_name }}: opening hours, driving directions, official site, phone numbers &  customer reviews.
    @endsection
    @section('description')
        {{ $company->locality_name }}, {{ $company->region_name }}.Find the nearest location, opening hours and driving diections. Customer reviews and available services.
    @endsection

<div class="l-drus-main__article">
    <article class="l-drus-article">

        <header class="l-drus-article__header" style="margin-top: 16px;">
            <h1 class="l-drus-article__h1 l-drus-article__h1--item">
                    {{ $company->name  }} in {{ $company->locality_name }}
            </h1>
            <p class="l-drus-article__header-text">
                {{ $company->name  }} in {{ $company->streetaddress }}, {{ $company->region_name }}:
                consumer reviews, opening hours, driving directions, photos etc.
            </p>
        </header>

        <div class="l-drus-article__section l-drus-article__section--ads">
<!--            --><?php //include ROOT . '/Templates/AdSense/line.html'; ?>
        </div>

        <section class="l-drus-article__section l-drus-article__section--white l-drus-article__item">

            <a name="contacts"></a>
            <div class="l-drus-article__item-item">
                <h2 class="l-drus-article__h2">
                    Contacts
                </h2>
                <p>
                        <a href="region-localiry-category_url"
                           class="l-drus-article__btn"
                           title="{{ $company->category_name }}">
                            {{ $company->category_name }}</a>
                </p>

                <p>
                <address>
                    {{ $company->streetaddress }},<br>
                    {{ $company->locality_name }},
                    {{ $company->region_name }}<br>
                    <?= ($company->postalcode) ? $company->postalcode . '' : '' ?>
                </address>
                </p>

                @if($company->telephone)
                    <p>
                        <b>{{ $company->telephone }}</b>
                    </p>
                @endif

                @if($company->website)
                    <p>
                        <a href="{{ $company->website }}" target="_blank"
                           rel="nofollow">Company site</a>
                    </p>
                @endif
            </div>

            <a name="hours"></a>
            <div class="l-drus-article__item-item">
                <h2 class="l-drus-article__h2">
                    {{ $company->name }}:
                </h2>

{{--                <table class="c-drus-table" width="100%">--}}
{{--                    <?php foreach ($data['item']['hours']['days'] as $day_number => $day) { ?>--}}
{{--                    <tr<?= ($day_number == $data['item']['hours']['this_day']) ? ' class="active"' : '' ?>>--}}
{{--                        <td>--}}
{{--                            <?= $data['days'][$day_number] ?>--}}
{{--                        </td>--}}
{{--                        <td>--}}
{{--                            <?php foreach ($day as $hours) { ?>--}}
{{--                            <div class="big">--}}
{{--                                <?= $hours['start'] ?> &mdash; <?= $hours['end'] ?>--}}
{{--                            </div>--}}
{{--                            <?php } ?>--}}
{{--                        </td>--}}
{{--                    </tr>--}}
{{--                    <?php } ?>--}}
{{--                </table>--}}

            </div>

            <div class="l-drus-article__item-item l-drus-article__item-item--ads">


                <h2 class="l-drus-article__h2">

                </h2>
            </div>
{{--        {{ dd($company) }}--}}
            <div class="l-drus-article__btn-box">
                <a href="{{ route('add-review', [$company->region_url, $company->locality_url, $company->url]) }}">
                    Write a  customer review
                </a>
                &nbsp;&nbsp;&nbsp;&#11049;&nbsp;&nbsp;&nbsp;
                <a href="updtae">
                    Suggest an update
                </a>
            </div>

        </section>

        <div class="l-drus-article__two">

            <div class="l-drus-article__two-first">

                <div class="l-drus-article__section">
<!--                    --><?php //include ROOT . '/Templates/AdSense/line.html'; ?>
                    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                    <!-- austria -->
                </div>


                <a name="reviews"></a>
                <section class="l-drus-article__section l-drus-article__section--white">

                    <h2 class="l-drus-article__h2">
                        Customer  Reviews about {{ $company->name }}:
                    </h2>

                    @if(isset($reviews) && $reviews->count())
                        @include('includes.list_reviews')
                    @else

                    <p>
                        At the moment, there are no reviews about {{ $company->name }}
                        If you bought something at a {{ $company->name }} or visited a service - leave feedback about this business service:
                    </p>
                    @endif

                    <div class="c-drus-add-rev">
                        <div class="c-drus-add-rev__text js-add-rev__text"
                             data-default-text="How would you rate this service?">
                            How would you rate this service?
                        </div>
                        <a class="c-drus-add-rev__btn js-add-rev__btn" href="add-review">
                            <span class="c-drus-add-rev__star js-add-rev__star" data-star-number="1"
                                  data-star-text="Terrible">&#9734;</span>
                            <span class="c-drus-add-rev__star js-add-rev__star" data-star-number="2"
                                  data-star-text="Poor">&#9734;</span>
                            <span class="c-drus-add-rev__star js-add-rev__star" data-star-number="3"
                                  data-star-text="Average">&#9734;</span>
                            <span class="c-drus-add-rev__star js-add-rev__star" data-star-number="4"
                                  data-star-text="Very good">&#9734;</span>
                            <span class="c-drus-add-rev__star js-add-rev__star" data-star-number="5"
                                  data-star-text="Excellent">&#9734;</span>
                        </a>
                    </div>

                </section>

                <div class="l-drus-article__section l-drus-article__section--ads">
                    @include('includes.adaptive')
                </div>

                <a name="gallery"></a>
                <section class="l-drus-article__section l-drus-article__section--white">

                    <h2 class="l-drus-article__h2">
                        Photo gallery of {{ $company->name }}
                    </h2>
                    <ul class="c-drus-list">
                        пока фото нету
{{--                        <?php foreach ($data['item']['photos'] as $photo) { ?>--}}
{{--                        <div class="c-drus-list__item c-drus-list__item--photo js-gallery__item"--}}
{{--                             data-src="<?= $photo ?>"--}}
{{--                             style="background-image: url('<?= $photo ?>')"></div>--}}
{{--                        <?php } ?>--}}
                    </ul>
                </section>

                <div class="l-drus-article__section l-drus-article__section--ads">
                    @include('includes.adaptive')
                </div>

                <section class="l-drus-article__section l-drus-article__section--white">

                    <h2 class="l-drus-article__h2">
                        About {{ $company->name }} in {{ $company->locality_name }}
                    </h2>

                    @if( isset($company->descr))
                        <p>
                            <?= str_replace("\n", '</p><p>', $company->descr) ?>
                        </p>
                    @else
                        {{ $company->name }} is business services based in {{ $company->region_name }}. <br>
                        {{ $company->name }}
                        is located at {{ $company->streetaddress }}, {{ $company->locality_name }}, {{ $company->region_name }}. You can find {{ $company->name }} opening hours, address, driving directions and map, phone numbers and photos. Find helpful customer reviewsand write your own review to rate the business service.
                    @endif
                </section>
            </div>

            <div class="l-drus-article__two-second">
                <div class="l-drus-article__section l-drus-article__section--white">
                    <h3 class="l-drus-aside__header">
                        The nearest business services in  {{ $company->locality_name }}
                    </h3>
                    <ul class="l-drus-aside-list">
                        @foreach($nearest_item as $item)
                        <li class="l-drus-aside-list__item">
                            <a class="l-drus-aside-list__link l-drus-aside-list__link--header"
                               href="{{ route('company', [$item->region_url, $item->locality_url, $item->url]) }}">
                                {{ $item->name}}
                            </a>

                            <div class="l-drus-aside-list__flex">
                                <small class="l-drus-aside-list__small">
                                    @if(isset($item->telephone))
                                    {{ $item->telephone }}
                                    <br>
                                    @endif
                                    {{ $item->streetaddress }},
                                    {{ $item->locality_name }},
                                    {{ $item->region_name }}
                                    <?= ($item->postalcode) ? $item->postalcode . '' : '' ?>
                                </small>
                            </div>
                        </li>
                        @endforeach
                    </ul>
{{--                    @include('includes.aside')--}}
                </div>
            </div>
        </div>
    </article>
</div>


{{--<script>--}}

{{--    var points = [--}}
{{--        [--}}
{{--            '<?= str_replace("'", "\'", $data['item']['name']) ?>',--}}
{{--            <?= $data['item']['lat'] ?>,--}}
{{--            <?= $data['item']['lng'] ?>,--}}
{{--            '<div class="c-map__marker-content">' +--}}
{{--            '<a href="//' + '<?= $data['item']['locality']['url']?>' + '.' + '<?= App::getRouter()->getHostMain() ?>' +--}}
{{--            '/' + '<?= $data['item']['url'] ?>' + '/' +--}}
{{--            '" class="c-map__link">' +--}}
{{--            '<?= str_replace("'", "\'", $data['item']['name']) ?></a><br>' +--}}
{{--            '<?= str_replace("'", "\'", $data['item']['address']) ?>' +--}}
{{--            '</div>'--}}
{{--        ],--}}
{{--    ];--}}

{{--    var markers = [];--}}
{{--    var map;--}}

{{--    var myLatLng = {lat: <?= $data['item']['lat'] ?>, lng: <?= $data['item']['lng'] ?>};--}}
{{--    var myMapZoom = 17;--}}

{{--    var myNeedAddReview = true;--}}
{{--    var myNeedGallery = true;--}}


{{--</script>--}}

{{--<div class="c-drus-modal__bg" id="js-gallery__modal-bg">--}}
{{--    &nbsp;--}}
{{--</div>--}}

{{--<div class="c-drus-modal__content" id="js-gallery__modal-content">--}}
{{--    <div class="c-drus-modal__content-box">--}}
{{--        <div class="c-drus-modal__close" id="js-gallery__modal-close">--}}
{{--            &#10007;--}}
{{--        </div>--}}
{{--        <img src="<?= current($data['item']['photos']) ?>" id="js-gallery__img">--}}
{{--    </div>--}}
{{--</div>--}}
@endsection
