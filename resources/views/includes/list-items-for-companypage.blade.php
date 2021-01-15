<ul class="c-drus-list" >
    @foreach ($items as $item)
            <li class="c-drus-list__item c-drus-list__item--2">
            <div class="c-drus-card" style="min-height: 170px" itemscope itemtype="https://schema.org/Organization">
                <div class="c-drus-card__box">
                    <div class="c-drus-card__info">
                        <a href="{{ route('company', [$item->region_url, $item->locality_url, $item->url]) }}"
                           class="c-drus-card__header">
                            <span itemprop="name">{{$item->name}}</span>
                        </a>
                        <p class="c-drus-card__line">
                                <a href="{{ route('category', $item->category_url) }}"
                                   class="c-drus-card__category">{{$item->category_name}}</a>
                        </p>
                        @if(isset($item->telephone))
                            <p class="c-drus-card__line" itemprop="telephone">
                                {{$item->telephone}}
                            </p>
                        @endif
                        <p class="c-drus-card__line" itemprop="address" itemscope itemtype="https://schema.org/PostalAddress">
                            <span itemprop="streetAddress">{{ ($item->streetaddress) ? $item->streetaddress. ', ' : '' }}</span>
                            <span itemprop="addressLocality">{{ $item->locality_name}}</span>,
                            <span itemprop="addressRegion">{{ $item->region_name }}</span>
                            <span itemprop="postalCode"><?= ($item->postalcode)? $item->postalcode : '' ?></span>
                        </p>
                    </div>
                </div>
            </div>
        </li>
    @endforeach
</ul>
