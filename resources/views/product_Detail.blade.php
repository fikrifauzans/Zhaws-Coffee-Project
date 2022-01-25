@extends('layouts.master')
@section('content')
    <div class="container">
        <div class="my-5">
            <p id="url"><a href="/" class="text-danger"> Home </a> / Detail Product</p>
        </div>


        <div class="row">
            <div class="parent-img col-9 col-md-9 col-lg-9 ">
                <img src="{{ asset('images/coffee/1.jpg') }}" class="img-fluid w-100" alt="">
            </div>

            <div class="child-img col-3 col-md-3 col-lg-3 d-flex flex-column justify-content-between">
                <img src="{{ asset('images/coffee/1.jpg') }}" alt="">
                <img src="{{ asset('images/coffee/2.jpg') }}" alt="">
                <img src="{{ asset('images/coffee/4.jpg') }}" alt="">
            </div>
        </div>

        <div class="row align-items-center border-top mt-3 ">
            <div class="title parent-img col-9 col-md-9 col-lg-9 mt-3">
                <h5><b>Arabika Aceh Gayo 1Kg</b></h5>
                <p class="text-danger"><b>Rp. 250.000</b> </p>

            </div>
            <div class=" col-3 col-md-3 col-lg-3 ">
                <button class="btn btn-success w-100"> Add To Cart</button>
            </div>
        </div>


        <div class="col-9 col-md-9 col-lg-9 p-0 border-bottom">
            <p style="text-align: justify">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Aspernatur harum omnis
                ipsum fugiat deleniti eum
                fuga doloribus consequatur, saepe maiores sapiente commodi dolorem ullam id, magnam rem neque voluptas
                distinctio eaque. Quam odio culpa et eius consequuntur error fuga sunt minima, autem quibusdam voluptatum
                consectetur facere quod! Dolore, impedit provident, dolor harum voluptas, soluta quidem pariatur numquam ad
                totam ducimus labore vel veniam fuga cupiditate consequuntur quibusdam earum expedita nobis eum. Unde sequi
                minus impedit incidunt tempore, at ducimus perspiciatis velit. Dolore saepe quibusdam eligendi facilis quia
                necessitatibus odio, ducimus expedita similique iusto consequuntur rem repudiandae omnis illum! Velit,
                perspiciatis!</p>
        </div>

        <h5 class="mt-3">Customers Review</h5>

        <div class="containter">
            <div class="col-9 col-md-9 col-lg-9 p-0 mt-3 mb-3 border "
                style="border-radius:20px; background-color: honeydew; ">
                <div>
                    <div id="userReview" class="d-flex flex-row border-bottom p-2 ">
                        <img class="img-fluid mr-3" src="{{ asset('images/coffee/5.jpg') }}" alt="">
                        <p class="my-auto">
                            Fikri Fauzan
                        </p>
                    </div>
                    <div class="container my-2">
                        <small>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab fugiat dolore unde magni nobis
                            esse
                            error
                            porro! Suscipit, ipsum voluptatum.</small>
                    </div>
                </div>
            </div>
        </div>



    </div>
@endsection
