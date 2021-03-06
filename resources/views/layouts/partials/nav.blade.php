<section id=#navbar>
    <nav id='nav-parent' data-aos="fade-down" data-aos-duration="2000" class="navbar navbar-expand-lg navbar-light ">
        <div class="container w-80">
            <div class="d-flex flex-column justify-content-center " data-aos="fade-down" data-aos-easing="linear"
                data-aos-duration="1500">
                <a href="#" class="brand text-center">ZHAWS <span style="color: var(--red)">COFFEE</span></a>
                <small class="text-center" style="font-size:12px; letter-spacing: 2px;">Crafted
                    with
                    quality</small>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse my-5 " id="navbarSupportedContent">
                <div class="mx-auto ">
                    <ul class="navbar-nav  navbar-menu">
                        <li data-aos="zoom-in" data-aos-duration="1000"><a href="/"
                                id="{{ Request::is('/') ? 'act' : '' }}">Home</a></li>
                        <li data-aos="zoom-in" data-aos-duration="1500"><a href="#">Service</a></li>
                        <li data-aos="zoom-in" data-aos-duration="2000"><a href="#">Products</a></li>
                        <li data-aos="zoom-in" data-aos-duration="2500"><a href="#">Contact</a></li>
                    </ul>
                </div>
                <div class=" d-flex flex-row src-form " id="cartAndSearch">
                    <div class="search-btn src-form ">
                        <form action="form-inline   ">
                            <input type="search" id="src-form" class="form-control  " placeholder="Search"
                                aria-label="Search">
                            <button class="src-btn"><i class="fas fa-search"></i></button>
                        </form>
                    </div>
                    <div class="d-flex  src-form position-relative">
                        <a href="{{ url('cart') . '/' . (Auth::user()->id ?? '') }}" class="ml-3 mr-3 mt-2 btn-cart">
                            <i class="fas fa-cart-arrow-down"></i>
                            @auth
                                <small
                                    {{ !Auth::user()->carts()->get()->sum('qty') == 0? Auth::user()->carts()->get()->sum('qty'): 'hidden' }}
                                    class="count-cart position-absolute">
                                    {{ Auth::user()->carts()->get()->sum('qty') }}
                                </small>
                            @endauth
                        </a>
                    </div>

                </div>
                <div class="ml-auto collapse navbar-collapse" id="signup-btn" id="navbarSupportedContent">

                    @if (Auth::user())
                        {{-- <form action="{{ route('logout') }}" method="post">@csrf
                            <button id="user" type="submit">{{ auth()->user()->name }}</button>
                        </form> --}}
                        <ul class="navbar-nav ml-auto" id="user">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">{{ auth()->user()->name }}</a>
                                <div class="dropdown-menu text-center " aria-labelledby="navbarDropdown">
                                    <form action="{{ url('user/info') }}" method="get">
                                        <button id="logout" class="navbar-item text-center my-2"
                                            type="submit">Info</button>
                                    </form>
                                    <form action="{{ url('user/history') }}" method="get">@csrf
                                        <button id="logout" class="navbar-item my-2" type="submit">Riwayat</button>
                                    </form>
                                    <form action="{{ route('logout') }}" method="post">@csrf
                                        <button id="logout" class="navbar-item my-2" type="submit">Logout</button>
                                    </form>
                                </div>
                            </li>
                        </ul>
                    @else
                        <a class="signup-btn ml-auto" href="/login">Login</a>
                    @endif
                </div>
            </div>

        </div>
    </nav>
</section>
