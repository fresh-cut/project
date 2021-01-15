<ul class="c-drus-list" >
    @foreach( $reviews as $review)
        <li class="c-drus-list__item c-drus-review" itemscope itemtype="https://schema.org/Review">
                <div class="c-drus-review__line c-drus-review__line--small">
                    <span itemprop="name">
                        <a href="{{ route('company', [$review->region_url, $review->locality_url, $review->url]) }}">Review
                        of "{{ $review->name }}" at {{ $review->locality_name }}</a>
                    </span>
                    <link itemprop="url" href="{{ URL::route('company', [$review->region_url, $review->locality_url, $review->url]) }}">
                </div>

            <span itemprop="itemReviewed" itemscope itemtype="http://schema.org/Organization">
                <meta itemprop="name" content="{{ $review->name }}"/>
            </span>

            <div class="c-drus-review__line" itemprop="reviewBody">
                {{ $review->review_comment }}
            </div>
            <div class="c-drus-review__line c-drus-review__line--small">
                <div class="c-drus-review__date">
                    <span itemprop="author" itemscope itemtype="https://schema.org/Person">
                        By <span itemprop="name">{{ $review->reviewer_name }}</span>,
                    </span>
                    <span itemprop="datePublished">{{ $review->review_data }}</span>
                </div>
            </div>
        </li>
    @endforeach
</ul>
