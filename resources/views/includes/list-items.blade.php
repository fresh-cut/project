<ul class="c-drus-list">
    @foreach ($items as $item)
        @if( Request::path()=='/')
            <li class="c-drus-list__item c-drus-list__item--2">
        @else
            <li class="c-drus-list__item ">
        @endif
            <div class="c-drus-card" itemscope itemtype="https://schema.org/Organization">
                <div class="c-drus-card__box">
                    <a href="{{ route('company', [$item->region_url, $item->locality_url, $item->url]) }}" class="c-drus-card__img"
                       style="background-image: url('/img/adr2.png');border: none">
                    </a>
                    <div class="c-drus-card__info">
                        <a href="{{ route('company', [$item->region_url, $item->locality_url, $item->url]) }}"
                           class="c-drus-card__header">
                            <span itemprop="name">{{$item->name}}</span></a>
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
