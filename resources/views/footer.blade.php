@if(!Route::is('home') && isset($footer_localities) && $footer_localities->count() && isset($footer_regions) && $footer_regions->count())
<div class="l-drus-pre-footer">
    <div class="l-drus-main__box l-drus-pre-footer__main-box">
        <div class="l-drus-pre-footer__box">
            <h4 class="l-drus-pre-footer__header">
                <?php echo settings('footer-popular-locality-text', 'Popular locations with business services:')?>
            </h4>
            <ul class="l-drus-pre-footer__list">
                @foreach ($footer_localities as $locality)
                <li class="l-drus-pre-footer__list-item l-drus-pre-footer__list-item--two">
                    <a class="l-drus-pre-footer__link"
                       href="{{route('city', $locality->url)}}">
                        {{ $locality->name }},
                        {{ $locality->region_name }}
                    </a>
                </li>
                @endforeach
            </ul>
        </div>
        <div class="l-drus-pre-footer__box">
            <h4 class="l-drus-pre-footer__header">
                <?php echo settings('footer-popular-region-text', 'Popular states with business services:')?>

            </h4>
            <ul class="l-drus-pre-footer__list">
                @foreach ($footer_regions as $region)
                <li class="l-drus-pre-footer__list-item l-drus-pre-footer__list-item--two">
                    <a class="l-drus-pre-footer__link"
                       href="{{ route('region', $region->url) }}">
                        {{ $region->name }}
                    </a>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endif

<footer class="l-drus-footer">
    <div class="l-drus-main__box">
        <div class="l-drus-footer__box">
            <ul class="l-drus-footer__list">
                <li class="l-drus-footer__list-item">
                    <a href="{{ route('all-regions') }}" class="l-drus-footer__list-link">
                        <?php echo settings('footer-all-states-text', 'All states')?>
                    </a>
                </li>

{{--                <?php if ($data['flag_news']) { ?>--}}
{{--                <li class="l-drus-footer__list-item">--}}
{{--                    <a href="//<?= App::getRouter()->getHostMain() ?>/articles/" class="l-drus-footer__list-link">--}}
{{--                        Articles</a>--}}
{{--                </li>--}}
{{--                <?php } ?>--}}

{{--                <?php foreach ($data['pages'] as $page) { ?>--}}
{{--                <li class="l-drus-footer__list-item">--}}
{{--                    <a href="//<?= App::getRouter()->getHostMain() ?>/pages/<?= $page['url'] ?>/"--}}
{{--                       class="l-drus-footer__list-link">--}}
{{--                        <?= $page['menu'] ?></a>--}}
{{--                </li>--}}
{{--                <?php } ?>--}}
                <li class="l-drus-footer__list-item">
                    <a href="{{ route('contact-us') }}" class="l-drus-footer__list-link">
                        <?php echo settings('footer-contact-us-text', 'Contact Us')?>
                    </a>
                </li>
                <li class="l-drus-footer__list-item">
                    <a href="{{ route('add-company') }}" class="l-drus-footer__list-link">
                        <?php echo settings('footer-add-listing-text', 'Add listing')?>
                    </a>
                </li>
            </ul>
        </div>
        <div class="l-drus-footer__box">
            &copy;
            <a href="{{ route('home') }}"
               class="l-drus-footer__link">{{ env('APP_URL') }}</a>
            <?= date('Y') ?>
        </div>
    </div>
</footer>
