@extends('template')
@section('main-content')
@section('title')
    404 - {{ env('APP_NAME') }}
@endsection
    <section class="container">
        <div class="row">
            <section class="col-md-6">
                <h1 class="l-drus-article__h1"  style="text-align:center;margin-bottom: 5px"><?php echo settings_404('header_text', '404 - Page not found')?></h1>
                <img style="display: block; margin: auto"src="/img/404.png" alt="picture" width="300px" height="300px">
            </section>
            <section class="col-md-6">
                <p>
                    We are sorry,
                    <br>
                    The page you requested could not be found. Either you have mistyped the requested page URL or the web address no longer exists.
                    If you have been looking for a business directory entry, the company could have been renamed or dissolved.
                </p>

                <ul style="padding-left: 40px"  >
                    <li type="disc">
                        Please try again using the search box of this page by entering a keyword and a city.
                    </li>
                    <li type="disc">
                        You have a business or run a business that is not yet registered in Cylex Business Directory? Then you have the possibility to use the 'Sign up' option for free.
                    </li>
                    <li type="disc">
                        In case you have questions or suggestions, please send us an e-mail to info@cylex-usa.com.
                    </li>
                </ul>
                <p>
                    Thank you for your understanding!<br>Cylex Service Team
                </p>
            </section>
        </div>
    </section>
@endsection

