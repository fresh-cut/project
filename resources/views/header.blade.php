<header class="l-drus-header">
    <div class="l-drus-main__box l-drus-header__box">
        <a class="l-drus-header__logo" href="{{ route('home') }}">
            <span class="l-drus-header__logo-img"></span>
            <span class="l-drus-header__logo-text"><?php echo settings_translate('logo_text','') ?></span>
        </a>

        @if(!Route::is('home'))
            <div>
                <script async src="https://cse.google.com/cse.js?cx={{ settings('google_search_key', '') }}"></script>
                <div class="gcse-search"></div>
            </div>

        @endif

    </div>
</header>
