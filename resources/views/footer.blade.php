@if(!Route::is('home') && (isset($footer_localities) && $footer_localities->count()) || (isset($footer_regions) && $footer_regions->count()))
<div class="l-drus-pre-footer">
    <div class="l-drus-main__box l-drus-pre-footer__main-box">
        @if(isset($footer_localities) && $footer_localities->count())
        <div class="l-drus-pre-footer__box">
            <h4 class="l-drus-pre-footer__header">
                <?php echo settings_translate('footer_popular_locality_text', 'Popular locations with business services:')?>
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
        @endif
        @if(isset($footer_regions) && $footer_regions->count())
        <div class="l-drus-pre-footer__box">
            <h4 class="l-drus-pre-footer__header">
                <?php echo settings_translate('footer_popular_region_text', 'Popular states with business services:')?>
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
        @endif
    </div>
</div>
@endif



<footer class="l-drus-footer">
    <div class="l-drus-main__box">
        <div class="l-drus-footer__box">
            <ul class="l-drus-footer__list">
                <li class="l-drus-footer__list-item">
                    <a href="{{ route('all-regions') }}" class="l-drus-footer__list-link">
                        <?php echo settings_translate('footer_all_states_text', 'All states')?>
                    </a>
                </li>
                <li class="l-drus-footer__list-item">
                    <a href="{{ route('contact-us') }}" class="l-drus-footer__list-link">
                        <?php echo settings_translate('footer_contact_us_text', 'Contact Us')?>
                    </a>
                </li>
                <li class="l-drus-footer__list-item">
                    <a href="{{ route('about-us') }}" class="l-drus-footer__list-link">
                        <?php echo settings_translate('footer_about_us_text', 'About Us')?>
                    </a>
                </li>
                <li class="l-drus-footer__list-item">
                    <a href="{{ route('add-company') }}" class="l-drus-footer__list-link">
                        <?php echo settings_translate('footer_add_listing_text', 'Add listing')?>
                    </a>
                </li>
            </ul>
            <ul class="l-drus-footer__list">
                <li class="l-drus-footer__list-item">
                    <a href="{{ route('privacy-policy') }}" class="l-drus-footer__list-link">
                        <?php echo settings_translate('footer_privacy_policy_text', 'Privacy Policy')?>
                    </a>
                </li>
                <li class="l-drus-footer__list-item">
                    <a href="{{ route('cookies-privacy') }}" class="l-drus-footer__list-link">
                        <?php echo settings_translate('footer_cookies_privacy_text', 'Сookies Privacy Policy')?>
                    </a>
                </li>
                <li class="l-drus-footer__list-item">
                    <a href="{{ route('faq') }}" class="l-drus-footer__list-link">
                        <?php echo settings_translate('footer_faq_text', 'FAQ')?>
                    </a>
                </li>
                <li class="l-drus-footer__list-item">
                    <a href="{{ route('terms-conditions') }}" class="l-drus-footer__list-link">
                        <?php echo settings_translate('footer_terms_conditions_text', 'Terms and conditions')?>
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
    <?php echo settings('code_footer', '') ?>
</footer>
