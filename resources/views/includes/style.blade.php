<style>
    html,body, .l-drus-article__btn, .l-drus-aside-list__link--header,
    .c-drus-form__input--submit, .c-drus-list__link--nav, .c-drus-card__category,
    .l-drus-bread__link{
        color: {{ settings('body-color', '#01A3DF') }};
    }
    .c-drus-list__link--nav:hover, .l-drus-aside-list__link--header:hover {
        color: {{ settings('body-color', '#01A3DF') }};
    }

    .l-drus-header__logo-text {
        color: {{ settings('logo-text-color', '#01A3DF') }};
    }
    .l-drus-article__section--ads, .l-drus-article__section--white, .c-drus-card {
        box-shadow: {{'0 1px 3px '.settings('box-shadow-color', '#01A3DF').', 0 1px 1px '.settings('box-shadow-color', '#01A3DF')}};
    }

    .l-drus-footer{
        background-color: {{ settings('footer-background-color', '#01A3DF') }} ;
    }
</style>
