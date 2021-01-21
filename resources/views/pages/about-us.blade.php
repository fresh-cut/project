@extends('template')
@section('main-content')
@section('title')
    {{ settings_translate('footer_about_us_text', 'About Us') }}
@endsection
@section('description'){{ settings_translate('footer_about_us_text', 'About Us') }}@endsection
<style>
    p {
        font-size: 14px;
        margin-bottom: 10px;
    }
    h1 {
        margin-bottom: 10px;
        font-size: 26px;
    }
    h2 {
        font-size: 18px;
        margin-bottom: 15px;
    }
    b {
        font-weight: bold;
    }
</style>
<section class="container">
    <div class="row">
        <div class="col-md-8">
            <h1>{{ settings_translate('footer_about_us_text', 'About Us') }}</h1>
            <p>
                Having more than a decade of experience on the international market, UsaIsOnline.com operates over 30 online business directories, visited by more than 1 million unique users daily, reaching out to 5 continents and millions of customers worldwide. UsaIsOnline.com took on the challenge of providing fast and simple ways in which our users can find the right service anywhere. The companies registered in our online business directory are actually promoting and showcasing their business to potential customers in a simple but appealing way.
            </p>
            <h2>What makes us unique?</h2>
            <p>
UsaIsOnline.com delivers relevant search results to users, customers with accurate business listings. Companies can display everything on their profile page that a customer might be looking for, meaning Google Maps and route-planner, opening hours, price lists, menus, products and services catalogs, leaflets, brochures, etc. With our promotions feature, companies can even offer discounts to customers gained through UsaIsOnline.com. We have learned that reviews are very important to customers because by reading them, they can benefit from other users' experiences. On our directory users have the possibility to read reviews, or write reviews about the companies or the products and services they offer. UsaIsOnline.com offers the opportunity to promote your company by being listed among the first results in the search engines. Through this, we help your potential clients to find you easier and to get the information they need about your company. Our listings are effective and free of charge. Our users and registered companies come first, so we do our best to focus on their demands and work hard on constantly improving our website and features. Users and companies can also turn to our customer support team that answers all customer issues within 48 hours.            </p>
            <h2>Our team</h2>
            <p>
                UsaIsOnline.com is represented by a team of around 200 specialists from various domains: online marketing, search engine marketing, web design, web programming, customer support, data processing, mobile application development, and international language specialists - English, German, Romanian, Italian, Spanish, Norwegian, French, Hungarian, Slovak, Greek, etc. Our offices are in the USA and German.            </p>
            <p>
                UsaIsOnline.com helps users find what they want.
            </p>
        </div>
        <div class="col-md-4">
            <h2>Contact:</h2>
            <img class="img-fluid" src="../img/logo.png" width="220px" height="60px" alt="...">
            <p>
                UsaIsOnline INC
                <br>
                <b>E-mail:</b> <a href="https://usaisonline.com/contact-us" target="_blank" rel="noopener">Contact us</a></p>
                <br>
                <b>Website:</b> <a href="https://usaisonline.com/" target="_blank" rel="noopener">https://usaisonline.com/</a>
                <br>
            </p>

        </div>
    </div>
</section>


@endsection
