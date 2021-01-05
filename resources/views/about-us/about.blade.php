@extends('template')
@section('main-content')
@section('title')
            About Us
@endsection
@section('description')
    About Us
@endsection

    <div class="l-drus-main__article">
        <article class="l-drus-article">
            <div class="l-drus-article__two l-drus-article__two--reverse">
                <div class="l-drus-article__two-first l-drus-article__two-first--reverse">
                    <section class="l-drus-article__section l-drus-article__section--white">
                        <h2 class="l-drus-article__h2">
                            About us
                        </h2>
                        <p class="l-drus-article__header-text">
                            Having more than a decade of experience on the international market, CYLEX operates over 30 online business directories, visited by more than 1 million unique users daily, reaching out to 5 continents and millions of customers worldwide. CYLEX took on the challenge of providing fast and simple ways in which our users can find the right service anywhere. The companies registered in our online business directory are actually promoting and showcasing their business to potential customers in a simple but appealing way.
                        </p>
                        <h2 class="l-drus-article__h2">
                            What makes us unique?
                        </h2>
                        <p class="l-drus-article__header-text">
                            CYLEX delivers relevant search results to users, customers with accurate business listings. Companies can display everything on their profile page that a customer might be looking for, meaning Google maps and route-planner, opening hours, price lists, menus, products and services catalogs, leaflets, brochures etc. With our promotions feature, companies can even offer discounts to customers gained through CYLEX. We have learned that reviews are very important to customers, because by reading them, they can benefit from other users' experiences. On our directory users have the possibility to read reviews, or write reviews about the companies or the products and services they offer. CYLEX offers the opportunity to promote your company by being listed among the first results in the search engines. Through this we help your potential clients to find you easier and to get the information they need about your company. Our listings are effective and free of charge. Our users and registered companies come first, so we do our best to focus on their demands and work hard on constantly improving our website and features. Users and companies can also turn to our customer support team that answers all customer issues within 48 hours
                        </p>

                    </section>
                </div>
                <div class="l-drus-article__two-second">
                    @include('includes.aside')
                </div>
            </div>
        </article>
    </div>
    <script async src="//www.google.com/recaptcha/api.js"></script>
@endsection
