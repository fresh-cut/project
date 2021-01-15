@if(isset($breadcrumbs))
<nav class="l-drus-bread">
        <ul class="l-drus-bread__box" itemscope itemtype="http://schema.org/BreadcrumbList">
            <li class="l-drus-bread__item" itemprop="itemListElement" itemscope
                itemtype="http://schema.org/ListItem">
                <a class="l-drus-bread__link" href="{{ route('home') }}" itemprop="item">
                    <span itemprop="name">Home</span>
                </a>
                <meta itemprop="position" content="1"/>
            </li>
            <?php $number=1 ?>
            @foreach($breadcrumbs as $name => $data)
                <?php $number++ ?>
            <li class="l-drus-bread__item" itemprop="itemListElement" itemscope
                itemtype="http://schema.org/ListItem">
                <a class="l-drus-bread__link" href="{{ route($data[0], $data[1]) }}" itemprop="item">
                    <span itemprop="name">{{ $name }}</span>
                </a>
                <meta itemprop="position" content="{{ $number }}"/>
            </li>
            @endforeach
        </ul>
</nav>
@endif
