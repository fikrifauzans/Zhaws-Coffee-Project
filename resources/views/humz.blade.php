@extends('layouts.master')
@section('content')
    <div class="container ">

        <div class="">
            <img src="{{ asset('images/coffee/Banner.png') }}" class="img-fluid banner-img" alt="">
        </div>

        {{-- Category --}}
        <div class="category-text d-flex justify-content-between my-5 my-0">
            <p><b>Select Category</b></p>
            <a class="text-danger" href="">Show All</a>
        </div>
        <div class="categories">
            <div class="row ">
                <div class="col-5 col-md-3 col-lg-2   category-card mr-2  ">
                    <a href="#" class="text-center " style="text-decoration: none;">
                        <img src="{{ asset('images/coffee/coffeeBeans.jpg') }}" class=" img-fluid" id="category-img">
                        <p class="text-center my-3">Coffee Beans</p>
                    </a>
                </div>

                <div class="col-5 col-md-3 col-lg-2   category-card mr-2">
                    <a href="#" style="text-decoration: none;">
                        <img src="{{ asset('images/coffee/souvenirs.jpg') }}" class="mx-auto  img-fluid"
                            id="category-img">
                        <p class="text-center my-3">Souvenirs</p>
                    </a>
                </div>
            </div>
        </div>

        {{-- Products --}}
        <div class="products">
            <div class="category-text d-flex justify-content-between my-5 my-0">
                <p><b> Select Product </b></p>
                {{-- <a href=""></a> --}}
            </div>
        </div>
        <div class=" row align-self-center">
            <div class="col-5 col-md-5 col-lg-4 card-products mb-3">
                <a href="#" class="text-decoration-none align-self-center">
                    <img class="img-fluid product-img mb-3"
                        src="{{ asset('images/coffee/daniel-tafjord-7GTxjNejlwg-unsplash.jpg') }}" alt="">
                    <p>Roasted Beans Arabika Puntang</p>
                    <p style="font-weight: 300;">Price: Rp. 120.000</p>
                    <p><span class="text-danger ">Rating 135 <i class="far fa-star"></i>&ensp; </span> <b> ||
                            &ensp;
                            Sold 360</b></p>
                </a>
            </div>
            <div class="col-5 col-md-5 col-lg-4 card-products mb-3">
                <a href="#" class="text-decoration-none align-self-center">
                    <img class="img-fluid product-img mb-3"
                        src="{{ asset('images/coffee/daniel-tafjord-7GTxjNejlwg-unsplash.jpg') }}" alt="">
                    <p>Roasted Beans Arabika Puntang</p>
                    <p style="font-weight: 300;">Price: Rp. 120.000</p>
                    <p><span class="text-danger ">Rating 135 <i class="far fa-star"></i>&ensp; </span> <b> ||
                            &ensp;
                            Sold 360</b></p>
                </a>
            </div>
            <div class="col-5 col-md-5 col-lg-4 card-products mb-3">
                <a href="#" class="text-decoration-none align-self-center">
                    <img class="img-fluid product-img mb-3"
                        src="{{ asset('images/coffee/daniel-tafjord-7GTxjNejlwg-unsplash.jpg') }}" alt="">
                    <p>Roasted Beans Arabika Puntang</p>
                    <p style="font-weight: 300;">Price: Rp. 120.000</p>
                    <p><span class="text-danger ">Rating 135 <i class="far fa-star"></i>&ensp; </span> <b> ||
                            &ensp;
                            Sold 360</b></p>
                </a>
            </div>
            <div class="col-5 col-md-5 col-lg-4 card-products mb-3">
                <a href="#" class="text-decoration-none align-self-center">
                    <img class="img-fluid product-img mb-3"
                        src="{{ asset('images/coffee/daniel-tafjord-7GTxjNejlwg-unsplash.jpg') }}" alt="">
                    <p>Roasted Beans Arabika Puntang</p>
                    <p style="font-weight: 300;">Price: Rp. 120.000</p>
                    <p><span class="text-danger ">Rating 135 <i class="far fa-star"></i>&ensp; </span> <b> ||
                            &ensp;
                            Sold 360</b></p>
                </a>
            </div>
            <div class="col-5 col-md-5 col-lg-4 card-products mb-3">
                <a href="#" class="text-decoration-none align-self-center">
                    <img class="img-fluid product-img mb-3"
                        src="{{ asset('images/coffee/daniel-tafjord-7GTxjNejlwg-unsplash.jpg') }}" alt="">
                    <p>Roasted Beans Arabika Puntang</p>
                    <p style="font-weight: 300;">Price: Rp. 120.000</p>
                    <p><span class="text-danger ">Rating 135 <i class="far fa-star"></i>&ensp; </span> <b> ||
                            &ensp;
                            Sold 360</b></p>
                </a>
            </div>
            <div class="col-5 col-md-5 col-lg-4 card-products mb-3">
                <a href="#" class="text-decoration-none align-self-center">
                    <img class="img-fluid product-img mb-3"
                        src="{{ asset('images/coffee/daniel-tafjord-7GTxjNejlwg-unsplash.jpg') }}" alt="">
                    <p>Roasted Beans Arabika Puntang</p>
                    <p style="font-weight: 300;">Price: Rp. 120.000</p>
                    <p><span class="text-danger ">Rating 135 <i class="far fa-star"></i>&ensp; </span> <b> ||
                            &ensp;
                            Sold 360</b></p>
                </a>
            </div>

        </div>


        {{-- Create Here for paginator button --}}
    </div>
    </div>
    </div>




@endsection
