@extends('layouts.master')
@section('content')
    <div class="container">
        <div class="my-3">
            <p id="url"><a href="/" class="text-danger"> Home &nbsp; </a> / &nbsp; Detail Product</p>
        </div>
        <div class="row">
            <div class="parent-img col-9 col-md-9 col-lg-9 ">
                <img id='imgmain' src="{{ asset('ProductImages/' . $product->images[0]->image_1) }}"
                    class="img-fluid w-100" alt="">
            </div>

            <div class="child-img col-3 col-md-3 col-lg-3 d-flex flex-column justify-content-between">
                <img id=img1 style="cursor: pointer" src="{{ asset('ProductImages/' . $product->images[0]->image_1) }}"
                    alt="">
                <img id=img2 style="cursor: pointer" src="{{ asset('ProductImages/' . $product->images[0]->image_2) }}"
                    alt="">
                <img id=img3 style="cursor: pointer" src="{{ asset('ProductImages/' . $product->images[0]->image_3) }}"
                    alt="">
            </div>
        </div>
        <div class="row align-items-center border-top mt-3 ">
            <div class="title parent-img col-9 col-md-9 col-lg-9 mt-3">
                <h5><b>{{ $product->name }}</b></h5>
                <p class="text-danger"><b>Rp. {{ $product->price }}</b> </p>

            </div>
            <div class=" col-3 col-md-3 col-lg-3 ">
                <a onclick="addToCart({{ Auth::user()->id }},{{ $product->id }})"
                    class="btn btn-success text-white w-100" href="{{ url('product/' . $product->id . '/addtocart') }}">
                    Add To Cart</a>
            </div>
        </div>
        <div class="col-9 col-md-9 col-lg-9 p-0 border-bottom">
            <p style="text-align: justify">{{ $product->description }}</p>
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
@push('javhome')
    <script>
        $(window).scroll(function() {
            if ($(document).scrollTop() > 50) {
                $('nav').addClass('transparent');
            } else {
                $('nav').removeClass('transparent');
            }
        });

        $(document).ready(function() {
            $('#img1').click(function() {
                let img = $('#img1').attr('src');
                $('#imgmain').attr('src', img)
            })
        })
        $(document).ready(function() {
            $('#img2').click(function() {
                let img = $('#img2').attr('src');
                $('#imgmain').attr('src', img)
            })
        })
        $(document).ready(function() {
            $('#img3').click(function() {
                let img = $('#img3').attr('src');
                $('#imgmain').attr('src', img)
            })
        })

        function addToCart(id, p) {
            const userId = id;
            const productId = p;
            $.ajax({
                type: "get",
                url: "{{ url('cart') }}/" + userId,
                data: "product_Id =" + p,
                dataType: "dataType",
                success: function(response) {
                    console.log(response);
                }
            });
        }
    </script>
@endpush
