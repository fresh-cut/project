<ul class="c-drus-list" >
    @foreach ($items as $item)
            <li class="c-drus-list__item c-drus-list__item--2">
            <div class="c-drus-card" style="min-height: 170px">
                <div class="c-drus-card__box">
                    <div class="c-drus-card__info">
                        <a href="{{ route('company', [$item->region_url, $item->locality_url, $item->url]) }}"
                           class="c-drus-card__header">
                            {{$item->name}}</a>
                        <p class="c-drus-card__line">
                                <a href="{{ route('category', $item->category_url) }}"
                                   class="c-drus-card__category">{{$item->category_name}}</a>
                        </p>
                        @if(isset($item->telephone))
                            <p class="c-drus-card__line">
                                {{$item->telephone}}
                            </p>
                        @endif
                        <p class="c-drus-card__line">
                            {{ ($item->streetaddress) ? $item->streetaddress. ', ' : '' }}
                            {{ $item->locality_name}},
                            {{ $item->region_name }}
                            <?= ($item->postalcode)? $item->postalcode : '' ?>
                        </p>
                    </div>
                </div>
            </div>
        </li>
    @endforeach
</ul>
