<aside class="l-drus-main__aside l-drus-aside">
{{--    <?php if ($data['news']) { ?>--}}
{{--    <div class="l-drus-aside__section">--}}
{{--        <h3 class="l-drus-aside__header">--}}
{{--            New articles--}}
{{--        </h3>--}}
{{--        <ul class="l-drus-aside-list">--}}
{{--            <?php foreach ($data['news'] as $news) { ?>--}}
{{--            <li class="l-drus-aside-list__item">--}}
{{--                <a href="//<?= App::getRouter()->getHostMain() ?>/articles/<?= $news['url'] ?>/"--}}
{{--                   class="l-drus-aside-list__link l-drus-aside-list__link--header">--}}
{{--                    <?= $news['header'] ?></a>--}}
{{--                <small class="c-drus-card__line c-drus-card__line--small">--}}
{{--                    <?= $news['description'] ?>--}}
{{--                </small>--}}
{{--                <small class="c-drus-card__line c-drus-card__line--small">--}}
{{--                    <?= $news['date'] ?>--}}
{{--                </small>--}}
{{--            </li>--}}
{{--            <?php } ?>--}}
{{--        </ul>--}}
{{--    </div>--}}
{{--    <?php } ?>--}}

    <section class="l-drus-article__section l-drus-article__section--ads">
        @include('includes.ads.ads-five')
    </section>
    @if(isset($last_items) && $last_items->count())
    <div class="l-drus-aside__section">
        <h3 class="l-drus-aside__header">
            <?php echo settings('aside-popular-services-text', 'Popular business services')?>
        </h3>
        <ul class="l-drus-aside-list">
            @foreach($last_items as $item)
            <li class="l-drus-aside-list__item">
                <a class="l-drus-aside-list__link l-drus-aside-list__link--header"
                   href="{{ route('company', [$item->region_url, $item->locality_url, $item->url]) }}">
                    {{ $item->name }}
                </a>
                <div class="l-drus-aside-list   __flex">
                    <small class="l-drus-aside-list__small">
                        {{ $item->streetaddress }},
                        {{ $item->locality_name }},
                        {{ $item->region_name }}
                        <?= ($item->postalcode)? $item->postalcode : '' ?>
                        @if ($item->telephone)
                        <br>
                            {{ $item->telephone }}
                        @endif
                    </small>
                </div>
            </li>
            @endforeach
        </ul>
    </div>
    @endif


    @if(isset($last_reviews) && $last_reviews->count())
     <div class="l-drus-aside__section">
        <h3 class="l-drus-aside__header">
            <?php echo settings('aside-latest-reviews-text', 'Latest reviews')?>
        </h3>
        <ul class="l-drus-aside-list">
            @foreach($last_reviews as $review)
            <li class="l-drus-aside-list__item">
                <a class="l-drus-aside-list__link l-drus-aside-list__link--header"
                   href="{{ route('company', [$review->region_url, $review->locality_url, $review->url]) }}">
                    {{ $review->name }}
                </a>
                <small class="l-drus-aside-list__small">
                    <?= (strlen($review->review_comment) > 150) ? substr($review->review_comment, 0, 150) . '...' : $review->review_comment ?>
                </small>
            </li>
            @endforeach
        </ul>
    </div>
        @endif
</aside>

