@extends('layouts.master')
@section('content')
    {{-- {{ dd(Auth::user()->api_token) }} --}}
    <div style="margin-top: 150px" class="container">
        <h5 style="font-weight: 300; color: grey:" class="text-center my-5">Your shoping cart</h5>
        @if (Auth::user()->carts()->get() !== null)
            @foreach (Auth::user()->carts()->get()
        as $item)
                <div id="parentCart{{ $item->id }}"
                    class="d-flex row justify-content-between align-items-center border-bottom py-2 my-2 border-top">
                    <div class="img-cart row align-items-center col-6">
                        <img style="object-fit: cover" class="mr-5 img-fluid"
                            src="{{ asset('ProductImages/' . $item->img) }}" alt="">
                        <p>{{ $item->name }}</p>
                    </div>
                    <div class="count d-flex align-items-center ">
                        <button onclick="deleteCart({{ $item->id }},{{ Auth::user()->id }})">
                            -
                        </button>
                        <input class="itemval{{ $item->id }}" type="number" value="{{ $item->qty }}"
                            class="mx-2 my-0">
                        <button onclick="addCart({{ $item->id }},{{ Auth::user()->id }})">
                            +
                        </button>
                    </div>
                    <div>Rp. <p class="price{{ $item->id }} d-inline">{{ $item->price }}</p>

                    </div>
                    <div>
                        <button onclick="destroy({{ $item->id }})" class="btn btn-danger ">x</button>
                    </div>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="modalDestroy{{ $item->id }}" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Hapus Item</h5>

                            </div>
                            <div class="modal-body">
                                Anda yakin akan menghapus item?
                            </div>
                            <div class="modal-footer">
                                <button id="dataDismiss{{ $item->id }}" type="button" class="btn btn-secondary"
                                    data-dismiss="modal">Batal</button>
                                <button id="destroyBtn{{ $item->id }}" type="button"
                                    class="btn btn-danger">Hapus</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="row justify-content-center  mt-5">
                <div class="col-4">
                </div>
                <div class="col-4">
                    <button id="purchase" class="btn btn-success py-3 w-100">Purchase</button>
                </div>
                <div class="col-4 ml-auto mt-3 text-center">
                    <p class="border-bottom pb-4 ml-">Total: Rp. <b class="total">{{ $total }}</b>
                    </p>
                </div>
            </div>
    </div>

    <!-- Modal -->
    <div class="modal fade mt-5" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class=" modal-dialog" role="document">
            <div class="modal-content mt-5">
                <div class="     modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Payment Confirm</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Lanjutkan prmbayara?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                    <form action="{{ url('purchase') }}" method="post">@csrf
                        <input class="jqname{{ $item->id ?? '' }}" type="hidden"
                            value="{{ Auth::user()->carts()->get() }}" name="purchase">
                        <button type="submit" class="btn btn-success">Lanjutkan</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
    @endif
    </div>
@endsection
@push('footer')
    hidden
@endpush
@push('javhome')
    <script>
        $(document).ready(function() {
            $('#purchase').click(function(e) {
                $('#exampleModal').modal('show')
            });
        });

        function addCart(itemid, userid) {
            // let [a, b] = [itemid, userid]
            $.ajax({
                type: "post",
                url: "{{ url('api/cart') }}",
                data: {
                    itemid,
                    userid
                },
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content'),
                    'Authorization': 'Bearer ' + $('meta[name="token"]').attr('content'),
                },
                dataType: "json",
                success: function(response) {
                    let total = 0;
                    response.total.forEach(a => {
                        total += a.qty * a.price
                    });
                    console.log(total);
                    $('.itemval' + itemid).val(response.data.qty);
                    $('.price' + itemid).html(response.data.price)
                    $('.count-cart').html(response.count);
                    $('.total').html(total);

                }
            })
            // console.log([userid], [itemid]);
        }

        function deleteCart(itemid, userid) {
            let [a, b] = [itemid, userid]
            $.ajax({
                type: "post",
                url: "{{ url('api/delete-cart') }}",
                data: {
                    itemid,
                    userid
                },
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content'),
                    'Authorization': 'Bearer ' + $('meta[name="token"]').attr('content'),
                },
                dataType: "json",
                success: function(response) {
                    let total = 0;
                    response.total.forEach(a => {
                        total += a.qty * a.price
                    });
                    console.log(total);
                    $('.itemval' + itemid).val(response.data.qty);
                    $('.price' + itemid).html(response.data.price)
                    $('.count-cart').html(response.count);
                    $('.total').html(total);
                }
            })

        };

        function destroy(id) {
            $('#modalDestroy' + id).modal('show')
            $('#destroyBtn' + id).click(function() {
                $.ajax({
                    type: "POST",
                    url: "{{ url('api/destroy-cart') }}",
                    data: {
                        id
                    },
                    headers: {
                        "Authorization": 'Bearer ' + $('meta[name="token"]').attr('content')
                    },
                    dataType: "json",
                    success: function(response) {
                        console.log(response);
                        $('#parentCart' + id).remove()
                        $('#dataDismiss' + id).click()
                        // $('button[data-dismiss="modal"]').modal('hide')
                    }
                });
            })
        }







        // console.log($('meta[name="csrf-token"]').attr('content'));
    </script>
@endpush
