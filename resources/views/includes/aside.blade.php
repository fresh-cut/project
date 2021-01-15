<aside class="l-drus-main__aside l-drus-aside">
    <section class="l-drus-article__section l-drus-article__section--ads">
        @include('includes.ads.ads-five')
    </section>
    @if(isset($last_items) && $last_items->count())
    <div class="l-drus-aside__section">
        <h3 class="l-drus-aside__header">
            <?php echo settings_translate('aside_popular_services_text', 'Popular business services')?>
        </h3>
        <ul class="l-drus-aside-list">
            @foreach($last_items as $item)
            <li class="l-drus-aside-list__item" itemscope itemtype="https://schema.org/Organization">
                <a class="l-drus-aside-list__link l-drus-aside-list__link--header"
                   href="{{ route('company', [$item->region_url, $item->locality_url, $item->url]) }}">
                    <span itemprop="name">{{ $item->name }}</span>
                </a>
                <div class="l-drus-aside-list   __flex">
                    <small class="l-drus-aside-list__small" itemprop="address" itemscope itemtype="https://schema.org/PostalAddress">
                        <span itemprop="streetAddress">{{ $item->streetaddress }}</span>,
                        <span itemprop="addressLocality">{{ $item->locality_name }}</span>,
                        <span itemprop="addressRegion">{{ $item->region_name }}</span>
                        <span itemprop="postalCode"><?= ($item->postalcode)? $item->postalcode : '' ?></span>
                        @if ($item->telephone)
                        <br>
                            <span itemprop="telephone">{{ $item->telephone }}</span>
                        @endif
                    </small>
                </div>
            </li>
            @endforeach
        </ul>
    </div>
    @endif


    @if(isset($last_reviews) && $last_reviews->count())
     <div class="l-drus-aside__section">
        <h3 class="l-drus-aside__header">
            <?php echo settings_translate('aside_latest_reviews_text', 'Latest reviews')?>
        </h3>
        <ul class="l-drus-aside-list" >
            @foreach($last_reviews as $review)
            <li class="l-drus-aside-list__item" itemscope itemtype="https://schema.org/Review">
                    <meta itemprop="name" content="Review of '{{ $review->name }}' at {{ $review->locality_name }}"/>
                    <a class="l-drus-aside-list__link l-drus-aside-list__link--header"
                       href="{{ route('company', [$review->region_url, $review->locality_url, $review->url]) }}">
                        {{ $review->name }}
                    </a>
                <link itemprop="url" href="{{ URL::route('company', [$review->region_url, $review->locality_url, $review->url]) }}">
                <span itemprop="itemReviewed" itemscope itemtype="http://schema.org/Organization">
                    <meta itemprop="name" content="{{ $review->name }}"/>
                </span>
                <meta itemprop="reviewBody" content="{{ $review->review_comment }}"/>
                <span itemprop="author" itemscope itemtype="http://schema.org/Person">
                    <meta itemprop="name" content="{{ $review->reviewer_name }}"/>
                </span>
                <meta itemprop="datePublished" content="{{ $review->review_data }}"/>
                <small class="l-drus-aside-list__small">
                    <?= (strlen($review->review_comment) > 150) ? substr($review->review_comment, 0, 150) . '...' : $review->review_comment ?>
                </small>
            </li>
            @endforeach
        </ul>
    </div>
        @endif
</aside>

