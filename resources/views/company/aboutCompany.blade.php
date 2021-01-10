@extends('template')
@section('main-content')
    @section('title')
        <?php $str=settings_translate('company_title_text', '{ $company->name } in { $company->streetaddress }, { $company->region_name }: opening hours, driving directions, official site, phone numbers &  customer reviews.');
            $search=['{ $company->name }', '{ $company->streetaddress }', '{ $company->region_name }'];
            $replace=[$company->name, $company->streetaddress, $company->region_name];
            echo str_replace($search, $replace, $str);
        ?>
    @endsection
    @section('description')<?php $str=settings_translate('company_description_text', '{ $company->locality_name }, { $company->region_name }.Find the nearest location, opening hours and driving diections. Customer reviews and available services.');
                $search=['{ $company->locality_name }', '{ $company->region_name }'];
                $replace=[$company->locality_name, $company->region_name];
                echo str_replace($search, $replace, $str);?> @endsection

<div class="l-drus-main__article">
    <article class="l-drus-article">

        <header class="l-drus-article__header" style="margin-top: 16px;">
            <h1 class="l-drus-article__h1 l-drus-article__h1--item">
                    {{ $company->name  }} in {{ $company->locality_name }}
            </h1>
            <p class="l-drus-article__header-text">
                {{ $company->name  }} in {{ $company->streetaddress }}, {{ $company->region_name }}:
                <?php echo settings_translate('company_after_head_text', 'consumer reviews, opening hours, driving directions, photos etc.')?>
            </p>
        </header>
        <div class="l-drus-article__section l-drus-article__section--ads" style="text-align: center">
                @include('includes.ads.ads-six')
        </div>
        <section class="l-drus-article__section l-drus-article__section--white l-drus-article__item">

            <div class="l-drus-article__item-item">
                <div class="l-drus-article__section l-drus-article__section--ads">
                    @include('includes.ads.ads-seven')
                </div>
            </div>


            <div class="l-drus-article__item-item">
                <h2 class="l-drus-article__h2">
                    <?php echo settings_translate('company_contacts_of_text', 'Contacts of').' '?>{{ $company->name }}:
                </h2>
                <p>
                    <a href="{{ route('category', $company->category_url ) }}"
                       class="l-drus-article__btn"
                       title="{{ $company->category_name }}">
                        {{ $company->category_name }}</a>
                </p>
                <p>
                <address>
                    {{ $company->streetaddress }},<br>
                    {{ $company->locality_name }},
                    {{ $company->region_name }}<br>
                    <?= ($company->postalcode) ? $company->postalcode . '' : '' ?>
                </address>
                </p>

                @if($company->telephone)
                    <p>
                        <b>{{ $company->telephone }}</b>
                    </p>
                @endif

                @if($company->website)
                    <p>Company site:
                        @if($company->follow==1 || $company->follow==2)
                        <a href="<?php echo '//'.urldecode($company->website) ?>" target="_blank"
                           rel="<?=($company->follow==1)?'follow':'nofollow'?>">{{ urldecode($company->website) }}</a>
                         @else
                            {{ urldecode($company->website) }}
                        @endif
                    </p>
                @endif
            </div>

            <div class="l-drus-article__item-item l-drus-article__item-item--ads">
                    @include('includes.ads.ads-eight')
            </div>
            <div class="l-drus-article__btn-box">
                <a href="{{ route('add-review', [$company->region_url, $company->locality_url, $company->url]) }}">
                    <?php echo settings_translate('company_costumer_review_text', 'Write a  customer review')?>
                </a>
                &nbsp;&nbsp;&nbsp;&#11049;&nbsp;&nbsp;&nbsp;
                <a href="{{ route('edit-company', [$company->region_url, $company->locality_url, $company->url]) }}">
                    <?php echo settings_translate('company_suggest_update_text', 'Suggest an update')?>
                </a>
            </div>

        </section>

        <div class="l-drus-article__two">

            <div class="l-drus-article__two-first">
                <section class="l-drus-article__section l-drus-article__section--white">

                    <h2 class="l-drus-article__h2">
                        <?php echo settings_translate('company_costumer_review_about_text', 'Customer Reviews about').' '?>{{ $company->name }}:
                    </h2>

                    @if(isset($reviews) && $reviews->count())
                        @include('includes.list_reviews')
                    @else

                    <p>
                        <?php $str=settings_translate('company_after_costumer_review_about_text','At the moment, there are no reviews about {$company->name}. If you bought something at a {$company->name} or visited a service - leave feedback about this business service:');
                                echo str_replace('{$company->name}', $company->name, $str);
                        ?>
                    </p>
                    @endif

                    <div class="c-drus-add-rev">
                        <div class="c-drus-add-rev__text js-add-rev__text"
                             data-default-text="How would you rate this service?">
                            <?php echo settings_translate('company_how_rate_text', 'How would you rate this service?')?>
                        </div>
                        <a class="c-drus-add-rev__btn js-add-rev__btn" href="{{ route('add-review', [$company->region_url, $company->locality_url, $company->url]) }}">
                            <span class="c-drus-add-rev__star js-add-rev__star" data-star-number="1"
                                  data-star-text="Terrible">&#9734;</span>
                            <span class="c-drus-add-rev__star js-add-rev__star" data-star-number="2"
                                  data-star-text="Poor">&#9734;</span>
                            <span class="c-drus-add-rev__star js-add-rev__star" data-star-number="3"
                                  data-star-text="Average">&#9734;</span>
                            <span class="c-drus-add-rev__star js-add-rev__star" data-star-number="4"
                                  data-star-text="Very good">&#9734;</span>
                            <span class="c-drus-add-rev__star js-add-rev__star" data-star-number="5"
                                  data-star-text="Excellent">&#9734;</span>
                        </a>
                    </div>
                </section>

                <section class="l-drus-article__section l-drus-article__section--white">

                    <h2 class="l-drus-article__h2">
                        <?php echo settings_translate('company_about_text', 'About').' '?> {{ $company->name }} in {{ $company->locality_name }}
                    </h2>

                    @if( isset($company->descr))
                        <p>
                            <?php $desc=str_replace("\n", '</p><p>', $company->descr) ?>
                            <?= str_replace("TITLE", $company->name, $desc) ?>
                        </p>
                    @else
                        {{ $company->name }} is business services based in {{ $company->region_name }}. <br>
                        {{ $company->name }}
                        is located at {{ $company->streetaddress }}, {{ $company->locality_name }}, {{ $company->region_name }}. You can find {{ $company->name }} opening hours, address, driving directions and map, phone numbers and photos. Find helpful customer reviewsand write your own review to rate the business service.
                    @endif
                </section>

{{--                <section class="l-drus-article__section l-drus-article__section--white">--}}
                <section class="l-drus-article__section ">
                    <h2 class="l-drus-article__h2" style="text-align: center; margin-top: 25px">
                        <?php echo settings_translate('popular_company_text','Popular business services')?>
                    </h2>
                    @include('includes.list-items-for-companypage')
                </section>

            </div>

            <div class="l-drus-article__two-second">
                <div class="l-drus-article__section l-drus-article__section--white">
                    <div class="l-drus-article__section l-drus-article__section--ads">
                        @include('includes.ads.ads-nine')
                    </div>
                    <h3 class="l-drus-aside__header">
                        <?php echo settings_translate('company_nearest_text', 'The nearest business services in').' '?> {{ $company->locality_name }}
                    </h3>
                    <ul class="l-drus-aside-list">
                        @foreach($nearest_item as $item)
                        <li class="l-drus-aside-list__item">
                            <a class="l-drus-aside-list__link l-drus-aside-list__link--header"
                               href="{{ route('company', [$item->region_url, $item->locality_url, $item->url]) }}">
                                {{ $item->name}}
                            </a>

                            <div class="l-drus-aside-list__flex">
                                <small class="l-drus-aside-list__small">
                                    @if(isset($item->telephone))
                                    {{ $item->telephone }}
                                    <br>
                                    @endif
                                    {{ $item->streetaddress }},
                                    {{ $item->locality_name }},
                                    {{ $item->region_name }}
                                    <?= ($item->postalcode) ? $item->postalcode . '' : '' ?>
                                </small>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </article>
</div>

<script src="{{ asset('js/OpenLayers.js') }}"></script>
<script>
    map = new OpenLayers.Map("basicMap");
    map.addLayer(new OpenLayers.Layer.OSM());

    var lonLat = new OpenLayers.LonLat({{ $company->longitude}},{{ $company->latitude }})
        .transform(
            new OpenLayers.Projection("EPSG:4326"), // transform from WGS 1984
            map.getProjectionObject() // to Spherical Mercator Projection
        );

    var zoom=16;

    var markers = new OpenLayers.Layer.Markers( "Markers" );
    map.addLayer(markers);

    markers.addMarker(new OpenLayers.Marker(lonLat));

    map.setCenter (lonLat, zoom);

</script>
@endsection
