<section id=#navbar>
    <nav id='nav-parent' class="navbar navbar-expand-lg navbar-light bg-white ">
        <div class="container w-80">
            <div class="d-flex flex-column justify-content-center ">
                <a href="#" class="brand text-center">Zhaws <span style="color: var(--red)">Coffee</span></a>
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
                        <li><a href="/" id="{{ Request::is('/') ? 'act' : '' }}">Home</a></li>
                        <li><a href="#">Service</a></li>
                        <li><a href="#">Products</a></li>
                        <li><a href="#">Contact</a></li>
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
                        <a href="/" class="ml-3 mr-3 mt-2 btn-cart">
                            <i class="fas fa-cart-arrow-down"></i>
                            <small class="count-cart position-absolute">11</small>
                        </a>
                    </div>

                </div>
                <div class="ml-auto" id="signup-btn">
                    <a class="signup-btn" href="#">Sign Up</a>
                </div>
            </div>

        </div>
    </nav>
</section>