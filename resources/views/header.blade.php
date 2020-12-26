<header class="l-drus-header">
    <div class="l-drus-main__box l-drus-header__box">
        <a class="l-drus-header__logo" href="logo">
            <span class="l-drus-header__logo-img"></span>
            <span class="l-drus-header__logo-text">Business services<br>in the United States</span>
        </a>

        @if(!Route::is('home'))
        <form class="l-drus-header__form" method="get" id="js-header-form"
              action="search">

{{--            <div class="l-drus-header__form-select-box">--}}
{{--                <span id="js-header__form-select-box--text">All types</span>--}}
{{--                <select id="js-header__form-select-box--select" name="type">--}}
{{--                    <option value="all" selected>--}}
{{--                        All types--}}
{{--                    </option>--}}
{{--                    <?php foreach ($data['categories'] as $category) { ?>--}}
{{--                    <option value="<?= $category['url'] ?>">--}}
{{--                        <?= $category['name'] ?>--}}
{{--                    </option>--}}
{{--                    <?php } ?>--}}
{{--                </select>--}}
{{--            </div>--}}

            <input type="text" class="l-drus-header__form-input" id="js-header-form__input">
            <input type="hidden" name="query" id="js-header-form__input--query" value="">
            <input type="hidden" name="lat" id="js-header-form__input--lat" value="">
            <input type="hidden" name="lng" id="js-header-form__input--lng" value="">
            <button type="submit" class="l-drus-header__form-submit" id="js-header-form__submit">
                <span></span>
            </button>

        </form>
        @endif

        <div class="l-drus-header__menu" id="js-header__menu--btn">
            <span class="l-drus-header__menu-img"></span>
        </div>
    </div>
</header>
