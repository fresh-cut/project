<ul class="c-drus-list">
    @foreach( $reviews as $review)
        <li class="c-drus-list__item c-drus-review">
                <div class="c-drus-review__line c-drus-review__line--small">
                    <a href="{{ route('company', [$review->region_url, $review->locality_url, $review->url]) }}">Review
                        of "{{ $review->name }}" at {{ $review->locality_name }}</a>
                </div>
{{--            <div class="c-drus-review__line c-drus-review__line--small">--}}
{{--                <div class="c-drus-review__stars">--}}

{{--                    <?php $i = 0;--}}

{{--                    while ($i < 5) {--}}

{{--                        $i++;--}}

{{--                        if ($i <= $review['mark']) { ?>--}}

{{--                            <b>&#9733;</b>--}}

{{--                        <?php } else { ?>--}}

{{--                            &#9734;--}}

{{--                        <?php } ?>--}}

{{--                    <?php } ?>--}}

{{--                </div>--}}

{{--            </div>--}}

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
