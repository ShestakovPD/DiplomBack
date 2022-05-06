
<!--Header_section-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="{{url('/');}}">
                   <img src="https://getbootstrap.com/docs/5.1/assets/brand/bootstrap-logo.svg" alt="" width="30" height="24">
                </a>

            <div class="container-fluid">
                <a class="navbar-brand" href="{{url('/');}}">SHOP</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                    <div class="collapse navbar-collapse" id="navbarScroll">
                      <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                        <li class="nav-item">
                          <a class="nav-link active" aria-current="page" href="{{url('/');}}">Home</a>
                        </li>
                        @if (Route::has('login'))
                            @auth
                            <a class="nav-link" aria-current="page" href="#">{{ Auth::user()->name }}</a>
                            <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a class="nav-link" aria-current="page" href="route('logout')"
                            onclick="event.preventDefault();
                                    this.closest('form').submit();">
                            {{ __('Log Out') }}</a>
                             </form>

                            @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>
                        </li>
                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                        </li>
                        @endif
                            @endauth
                        @endif

                        <li class="nav-item ">
                            <button type="button" class="btn btn-primary position-relative btn_nav">
                            {{--Inbox--}}
                            <a class="nav-link backet_nav" href="#{{--{{ route('basket') }}--}}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">

                                <img src="assets\img\baskets.png" class="card-img-top" alt="..."></a>
                                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">99+
                                    <span class="visually-hidden">unread messages</span>
                                </span>
                            </button>




                        </li>
                      </ul>
                      <form class="d-flex">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                      </form>
                </div>
            </div>
        </nav>
<!--Header_section-->
