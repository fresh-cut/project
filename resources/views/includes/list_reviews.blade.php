<ul class="c-drus-list">
    @foreach( $reviews as $review)
        <li class="c-drus-list__item c-drus-review">
                <div class="c-drus-review__line c-drus-review__line--small">
                    <a href="{{ route('company', [$review->region_url, $review->locality_url, $review->url]) }}">Review
                        of "{{ $review->name }}" at {{ $review->locality_name }}</a>
                </div>
            <div class="c-drus-review__line">
                {{ $review->review_comment }}
            </div>
            <div class="c-drus-review__line c-drus-review__line--small">
                <div class="c-drus-review__date">
                    By {{ $review->reviewer_name }}, {{ $review->review_data }}
                </div>
            </div>
        </li>
    @endforeach
</ul>
