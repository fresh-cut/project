<!doctype html>
<html lang="en-US">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>
    <meta name="description" content="@yield('description')">
    <link rel="canonical" href="{{url()->current()}}"/>

{{-- для рекламы--}}
    <script type="text/javascript"> rbConfig={start:performance.now(),rbDomain:"rwbk.kikwwwi.site",rotator:'1a0'};</script>
    <script async="async" type="text/javascript" src="//rwbk.kikwwwi.site/1a0.min.js"></script>



    <link rel="apple-touch-icon" href="{{ asset('apple-touch-icon.png') }}">
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
    <link rel="icon" href="/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('css/css/main.css') }}">
    @include('includes.style')
    @if(Route::is('add-company') || Route::is('edit-company'))
        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
        <script src="//code.jquery.com/jquery-1.10.2.js"></script>
        <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    @endif
        <script>
        WebFontConfig = {
            google: {
                families: ['Open Sans:400,300,700:latin']
            },
            timeout: 3000
        };
    </script>
    <meta name="format-detection" content="telephone=no">

    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
        ga('create', 'UA-107038667-1', 'auto');
        ga('send', 'pageview');
    </script>

</head>
<body>

<div class="l-drus-main">
    @include('header')
    @if( !Route::is('home') )
        @include('includes.breadcrumbs')
    @endif

    @if( Route::is('home'))
    <div class="p-drus-first">
        <div class="p-drus-first__box">
            <div class="p-drus-first__form-name">
                <?php echo settings_translate('search_text', 'Find business services in the United States') ?>
            </div>
{{--            <form class="l-drus-header__form p-drus-first__form" method="get" id="js-header-form"--}}
{{--                  action="{{ route('search') }}">--}}
{{--                <input type="text" class="l-drus-header__form-input" id="js-header-form__input">--}}
{{--                <input type="hidden" name="query" id="js-header-form__input--query" value="">--}}
{{--                <input type="hidden" name="lat" id="js-header-form__input--lat" value="">--}}
{{--                <input type="hidden" name="lng" id="js-header-form__input--lng" value="">--}}
{{--                <button type="submit" class="l-drus-header__form-submit" id="js-header-form__submit">--}}
{{--                    <span></span>--}}
{{--                </button>--}}
{{--            </form>--}}
            <div>
                <script async src="https://cse.google.com/cse.js?cx={{ settings('google_search_key', '') }}"></script>
                <div class="gcse-search"></div>
            </div>
        </div>
    </div>

    <main class="l-drus-main__box l-drus-main__main">
        @yield('main-content')
    </main>
    @else
        @if( Route::is('company') && isset($company))
            <div id="basicMap" class="l-drus-main__map" style="width: 100%;height: 300px;"></div>
        @endif
    <main class="l-drus-main__box l-drus-main__main<?= (Route::is('company')) ? ' l-drus-main__main--item' : '' ?>">
        @yield('main-content')
    </main>
    @endif

    @include('footer')

</div>

<script src="{{ asset('js/main.js') }}"></script>
<script>
    @if( session()->has('message-success'))
        alert("{{ session()->get('message-success') }}");
    @endif
</script>
</body>
</html>
