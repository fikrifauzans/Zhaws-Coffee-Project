@extends('layouts.master')
@section('content')
    <div class="container ">

        <div>
            <img src="{{ asset('images/coffee/Banner.png') }}" class="img-fluid banner-img shadow-lg "
                data-aos-duration="3000" data-aos="fade-up" alt="">
        </div>

        {{-- Category --}}
        <div class=" category-text d-flex justify-content-between my-5 ">
            <p><b>Select Category</b></p>
            <a class="text-danger" href="">Show All</a>
        </div>
        <div class="categories">
            <div class="row ">
                <div class="col-5 col-md-3 col-lg-2   category-card mr-2  " data-aos="flip-left" data-aos-duration="2000">
                    <a href="#" class="text-center " style="text-decoration: none;">
                        <img src="{{ asset('images/coffee/coffeeBeans.jpg') }}" class=" img-fluid" id="category-img">
                        <p class="text-center my-3">Coffee Beans</p>
                    </a>
                </div>

                <div class="col-5 col-md-3 col-lg-2   category-card mr-2" data-aos="flip-left" data-aos-duration="3000">
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
            <div class="category-text d-flex justify-content-between my-5 ">
                <p><b> Select Product </b></p>
                {{-- <a href=""></a> --}}
            </div>
        </div>
        <div class=" row align-self-center">
            @foreach ($Products as $product)
                <div class="col-5 col-md-5 col-lg-4 card-products mb-5 ">
                    <a href="/product/{{ $product->id }}" class="text-decoration-none align-self-center">
                        <img class="img-fluid product-img mb-3"
                            src="{{ asset('ProductImages/' . $product->images->pluck('image_1')->implode('')) }}" alt="">
                        <p>{{ $product->name }}</p>
                        <p style="font-weight: 300;">Price: Rp. {{ $product->price }}</p>
                        <p><span class="text-danger ">Rating {{ $product->rating }} <i class="far fa-star"></i>&ensp;
                            </span>
                            <b> ||
                                &ensp;
                                Sold {{ $product->sold }}</b>
                        </p>
                    </a>
                </div>
            @endforeach
            <div class="mx-auto ">
                {{ $Products->links() }}
            </div>
        </div>
    </div>
@endsection
