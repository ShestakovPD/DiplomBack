<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

{{ Html::style('css/libs.min.css') }}
{{ Html::style('css/main.css') }}
{{ Html::style('css/media.css') }}
<div class="content-middle">
    <div class="content-head__container">
        <div class="content-head__title-wrap">

            @if (isset($category_num))
                <div class="content-head__title-wrap__title bcg-title">Игры в разделе {{$category_num}}</div>
            @elseif(isset($product_id))
                <div class="content-head__title-wrap__title bcg-title">{{ $product_id[($id)-1]['name'] }} в разделе action</div>
            @else
                <div class="content-head__title-wrap__title bcg-title">Последние товары</div>
            @endif

        </div>
        <div class="content-head__search-block">
            <div class="search-container">
                <form class="search-container__form">
                    <input type="text" class="search-container__form__input">
                    <button class="search-container__form__btn">search</button>
                </form>
            </div>
        </div>
    </div>

    <div class="content-main__container">
        <div class="products-columns">
            @isset($product)
                @foreach ($product as $prod)
                    @php
                        $qw=$product[($prod['id'])-1]->id;
                        $url = "/product_page/"."$qw";
                    @endphp

                    <div class="products-columns__item">
                        <div class="products-columns__item__title-product"><a href='{{url("$url")}}' class="products-columns__item__title-product__link">{{ $product[($prod['id'])-1]->name }}</a></div>
                        <div class="products-columns__item__thumbnail"><a href='{{url("$url")}}' class="products-columns__item__thumbnail__link"><img src="{{ $product[($prod['id'])-1]->img }}" alt="Preview-image" class="products-columns__item__thumbnail__img"></a></div>
                        <div class="products-columns__item__description"><span class="products-price">{{ $product[($prod['id'])-1]->price }} руб</span><a href="#" class="btn btn-blue">Купить</a></div>
                    </div>
                @endforeach
            @endisset

            @isset($product_id)

    <div class="content-main__container">
        <div class="product-container">
            <div class="product-container__image-wrap"><img src="{{URL::asset($product_id[($id)-1]['img'])}}" class="image-wrap__image-product"></div>
                <div class="product-container__content-text">
                     <div class="product-container__content-text__title">{{ $product_id[$id-1]['name'] }}</div>
                         <div class="product-container__content-text__price">
                             <div class="product-container__content-text__price__value">
                                  Цена: <b>{{ $product_id[$id-1]['price'] }}</b> руб
                                        </div><a href="#" class="btn btn-blue">Купить</a>
                                    </div>
                                    <div class="product-container__content-text__description">
                                        <p>
                                            {{ $product_id[$id-1]['desc'] }}
                                        </p>
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                                            sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad
                                            minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                                            aliquip ex ea commodo consequat.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            @endisset

        </div>
    </div>
    <div class="content-footer__container">
        <ul class="page-nav">
            <li class="page-nav__item"><a href="#" class="page-nav__item__link"><i class="fa fa-angle-double-left"></i></a></li>
            <li class="page-nav__item"><a href="#" class="page-nav__item__link">1</a></li>
            <li class="page-nav__item"><a href="#" class="page-nav__item__link">2</a></li>
            <li class="page-nav__item"><a href="#" class="page-nav__item__link">3</a></li>
            <li class="page-nav__item"><a href="#" class="page-nav__item__link">4</a></li>
            <li class="page-nav__item"><a href="#" class="page-nav__item__link">5</a></li>
            <li class="page-nav__item"><a href="#" class="page-nav__item__link"><i class="fa fa-angle-double-right"></i></a></li>
        </ul>
    </div>
</div>
