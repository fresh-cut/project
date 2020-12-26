<ul class="c-drus-list">
    @foreach ($items as $item)
        @if( Request::path()=='/')
            <li class="c-drus-list__item c-drus-list__item--2">
        @else
            <li class="c-drus-list__item">
        @endif
            <div class="c-drus-card">
                <div class="c-drus-card__box">
                    <a href="#" class="c-drus-card__img"
                       style="background-image: url('../img/adr2.png');border: none">
                    </a>
                    <div class="c-drus-card__info">
                        <a href="{{ route('company', [$item->region_url, $item->locality_url, $item->url]) }}"
                           class="c-drus-card__header">
                            {{$item->name}}</a>
                        <p class="c-drus-card__line">
                                <a href="category-url"
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

        <?php if ((isset($items_ads) && ($items_ads)) && (($i % 4) == 0) && (count($items) >= ($i + 4))) { ?>

            <li class="c-drus-list__item c-drus-list__item--ads">

                <?php include ROOT . '/Templates/AdSense/adaptive.html'; ?>

            </li>

        <?php } ?>

    @endforeach

</ul>
