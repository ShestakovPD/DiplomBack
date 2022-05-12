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
                <div class="content-head__title-wrap__title bcg-title">{{ $product_id[($id)-1]['name'] }} в разделе
                    action
                </div>
            @elseif(isset($orders))
                <div class="content-head__title-wrap__title bcg-title">Мои заказы</div>
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
                    {{--{{var_dump($prod)}}--}}
                    @php

                        $qw=$product[($prod['id'])-1]->id;
                        $url = "/product_page/"."$qw";
                    @endphp

                    <div class="products-columns__item">
                        <div class="products-columns__item__title-product"><a href='{{url("$url")}}'
                                                                              class="products-columns__item__title-product__link">{{ $product[($prod['id'])-1]->name }}</a>
                        </div>
                        <div class="products-columns__item__thumbnail"><a href='{{url("$url")}}'
                                                                          class="products-columns__item__thumbnail__link"><img
                                    src="{{URL::asset($product[($prod['id'])-1]->img)}}" alt="Preview-image"
                                    class="products-columns__item__thumbnail__img"></a></div>
                        <div class="products-columns__item__description"><span class="products-price">{{ $product[($prod['id'])-1]->price }} руб</span><a
                                href="#" class="btn btn-blue">Купить</a></div>
                    </div>
                @endforeach
            @endisset


            @isset($product_id)

                <div class="content-main__container">
                    <div class="product-container">
                        <div class="product-container__image-wrap"><img
                                src="{{URL::asset($product_id[($id)-1]['img'])}}" class="image-wrap__image-product">
                        </div>
                        <div class="product-container__content-text">
                            <div class="product-container__content-text__title">{{ $product_id[$id-1]['name'] }}</div>
                            <div class="product-container__content-text__price">
                                <div class="product-container__content-text__price__value">
                                    Цена: <b>{{ $product_id[$id-1]['price'] }}</b> руб
                                </div>


                                @if (Auth::check())
                                    <form method="post" action="/order">
                                        @csrf
                                        <input type="hidden" name="name_prod" value="{{ $product_id[$id-1]['name'] }}">
                                        <input type="hidden" name="price" value="{{ $product_id[$id-1]['price'] }}">
                                        <input type="hidden" name="id_prod" value="{{ $product_id[$id-1]['id'] }}">
                                        <input type="hidden" name="email_user" value='{{ Auth::user()->email }}'>
                                        <input type="hidden" name="img"
                                               value='{{URL::asset($product_id[($id)-1]['img'])}}'>
                                        <a href="#"> <input type="submit" name="submit" value="Купить"
                                                            class="btn btn-blue"></a>
                                    </form>
                                @else
                                    <a href="{{url('/login')}}" class="btn btn-blue">Купить</a>
                                @endif

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
        @isset($orders)
            {{--        <div class="content-middle">--}}
            <div class="cart-product-list">

                @foreach ($orders as $orderq)
                    <div class="cart-product-list__item">

                        <div class="cart-product__item__product-photo"><img src="{{URL::asset($orderq->img)}}"
                                                                            class="cart-product__item__product-photo__image">
                        </div>
                        <div class="cart-product__item__product-name">
                            <div class="cart-product__item__product-name__content"><a
                                    href="#">{{ $orderq->name_prod }}</a></div>
                        </div>
                        <div class="cart-product__item__cart-date">
                            <div class="cart-product__item__cart-date__content">{{ $orderq->created_at }}</div>
                        </div>
                        <div class="cart-product__item__product-price"><span class="product-price__value">{{ $orderq->price }} рублей</span>
                        </div>
                    </div>
                @endforeach


                <div class="cart-product-list__result-item">
                    <div class="cart-product-list__result-item__text">Итого</div>
                    <div class="cart-product-list__result-item__value">{{ $sum }} рублей</div>
                </div>
            </div>
            <div class="content-footer__container">
                <div class="btn-buy-wrap"><a href="#" class="btn-buy-wrap__btn-link">Перейти к оплате</a></div>
            </div>
            {{--  </div>--}}
        @endisset

    </div>
</div>

<div class="content-footer__container">
    <ul class="page-nav">
        <li class="page-nav__item"><a href="#" class="page-nav__item__link"><i class="fa fa-angle-double-left"></i></a>
        </li>
        <li class="page-nav__item"><a href="#" class="page-nav__item__link">1</a></li>
        <li class="page-nav__item"><a href="#" class="page-nav__item__link">2</a></li>
        <li class="page-nav__item"><a href="#" class="page-nav__item__link">3</a></li>
        <li class="page-nav__item"><a href="#" class="page-nav__item__link">4</a></li>
        <li class="page-nav__item"><a href="#" class="page-nav__item__link">5</a></li>
        <li class="page-nav__item"><a href="#" class="page-nav__item__link"><i class="fa fa-angle-double-right"></i></a>
        </li>
    </ul>
</div>


</div>
