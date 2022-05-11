
<!--Header_section-->
       <header class="main-header">
        <div class="logotype-container"><a href="{{url('/')}}" class="logotype-link"><img src="{{URL::asset('img/logo.png')}}" alt="Логотип"></a></div>
        <nav class="main-navigation">
          <ul class="nav-list">
            <li class="nav-list__item"><a href="{{url('/')}}" class="nav-list__item__link">Главная</a></li>
            <li class="nav-list__item"><a href="#" class="nav-list__item__link">Мои заказы</a></li>
            <li class="nav-list__item"><a href="#" class="nav-list__item__link">Новости</a></li>
            <li class="nav-list__item"><a href="#" class="nav-list__item__link">О компании</a></li>
          </ul>
        </nav>
        <div class="header-contact">
          <div class="header-contact__phone"><a href="#" class="header-contact__phone-link">Телефон: 33-333-33</a></div>
        </div>
        <div class="header-container">
          <div class="payment-container">
            <div class="payment-basket__status">
              <div class="payment-basket__status__icon-block">

                  @if (Route::has('login'))
                      @auth
                  <form method="post" action="/order/basket">
                      @csrf
                      <input type="hidden" name="email_user" value='{{ Auth::user()->email }}'>
                      <a href="#" class="payment-basket__status__icon-block__link">
                          <i class="fa fa-shopping-basket"><input type="submit" name="submit" value=""></i>

                      </a>
                  </form>
                  @else
                      <a href="#" class="payment-basket__status__icon-block__link"><i class="fa fa-shopping-basket"></i></a>

                      @endauth
                  @endif

              </div>

                <div class="payment-basket__status__basket">
                    <span class="payment-basket__status__basket-value">0</span>
                    <span class="payment-basket__status__basket-value-descr">товаров</span>
                </div>

            </div>
          </div>
          <div class="authorization-block">
              @if (Route::has('login'))
                @auth
                      <a href="#" class="authorization-block__link">{{ Auth::user()->name }}</a>
                      <form method="POST" action="{{ route('logout') }}">
                      @csrf
                      <a href="route('logout')" class="authorization-block__link" onclick="event.preventDefault(); this.closest('form').submit();">{{ __('Log Out') }}</a>
                      </form>
                @else
                          <!-- <a class="nav-link" href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a> -->
                           <a href="{{ route('login') }}" class="authorization-block__link">Войти</a>

                @if (Route::has('register'))
                          <!-- <a class="nav-link" href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a> -->
                          <a href="{{ route('register') }}" class="authorization-block__link">Регистрация</a></div>
                @endif
               @endauth
              @endif

        </div>
      </header>
<!--Header_section-->
