@extends('layouts.master')
@section('content')
    <div class="container " style="color:gray">
        <div class="row">
            <div class="col-6  border " style="margin-top: 150px;  border-radius:20px;">
                <h6 class="text-center my-5 ">Payment Confirm</h6>
                <div class="row justify-content-center pb-3 ">
                    <div class="col-3 row justify-content-center "><b>Item</b></div>
                    <div class="col-3 row justify-content-center "><b></b></div>
                    <div class="col-3 row justify-content-center "><b>Qty</b></div>
                    <div class="col-3 row justify-content-center "><b>Total Price</b></div>
                </div>
                @foreach ($carts as $cart)
                    <div class="row justify-content-center ">
                        <div class="col-3 row justify-content-center my-2">{{ $cart->name }}</div>
                        <div class="col-3 row justify-content-center my-2"></div>
                        <div class="col-3 row justify-content-center my-2">{{ $cart->qty }}</div>
                        <div class="col-3 row justify-content-center my-2">Rp. {{ $cart->price * $cart->qty }}</div>
                    </div>
                @endforeach
                <div class="row justify-content-center ">
                    <div class="col-3 row justify-content-center my-2 expeditionName"></div>
                    <div class="col-3 row justify-content-center my-2 expeditionDay"></div>
                    <div class="col-3 row justify-content-center my-2"></div>
                    <div class="col-3 row justify-content-center my-2">
                        <p class="expeditionPrice"></p>
                    </div>
                </div>
                <div class="border my-3"></div>
                <small><b>Berat Total adalah <span class="totalWeight">{{ $carts->sum('qty') }}</span> Kg</b></small>
                <div class="row justify-content-center my-3">
                    <div class="col-3 row justify-content-center my-2"></div>
                    <div class="col-3 row justify-content-center my-2"></div>
                    <div class="col-3 row justify-content-center my-2">Total:</div>
                    <div class="col-3 row justify-content-center my-2 total" total="{{ $total }}">Rp.
                        <p class="totalPrice">{{ $total }}</p>
                    </div>
                </div>
            </div>
            <div class="col-6 text-center" style="margin-top:150px">
                <h6 class="my-5">Pilih Alamat:</h6>
                <div class="col-10 mx-auto">
                    <select class="form-control" id="addressUser">
                        <option>Pilih Alamat</option>
                        @foreach ($address as $item)
                            <option name="{{ $item->city_id }}">Penerima: {{ $item->receiver }} || Alamat:
                                {{ $item->complete_address }}</option>
                        @endforeach
                    </select>
                    <div>
                        <label class="my-3" for="">Pengiriman</label>
                        <select class="form-control expedition">
                            <option>Pilih Kurir</option>
                        </select>
                    </div>
                    <div>
                        <label class="my-3" for="">Paket</label>
                        <select class="form-control package">
                            <option>Pilih Paket</option>
                        </select>
                    </div>
                </div>
                <div>
                    <h6 class="my-5">Payment Method:</h6>
                    <div class="d-flex justify-content-center">
                        <div>
                            <img class="mr-5 pointer" style="width:100px;height:100px; cursor: pointer;"
                                src="{{ asset('images/bri.svg') }}" alt="">
                        </div>
                        <div>
                            <img style="width:100px;height:100px; cursor: pointer;" src="{{ asset('images/qris.svg') }}"
                                alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="d-flex felx-row col-6 mx-auto justify-content-center mt-5">
            <button class=" my-5 btn btn-success ConfrimModal">Konfirmasi Pembayaran</button>
        </div>
    </div>

    <!-- Confirm Modal -->
    <div class="modal fade" id="ConfirmPayment" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Konfirmasi Pembayaran</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Lanjutkan Pembayaran?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                    <form action="{{ url('/total_purchase') }}" method="POST">@csrf
                        <input type="hidden" name="carts" value="{{ $carts }}">
                        <div id="totalPurchase"></div>
                        <button type="submit" class="btn btn-success">Lanjutkan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('footer')
    hidden
@endpush
@push('javhome')
    <script>
        $("#addressUser").change(function() {
            let destination = $(this).find(":selected").attr('name')
            let totalWeight = $(".totalWeight").text();
            $.ajax({
                type: "POST",
                url: "{{ url('api/cekongkir') }}",
                data: {
                    destination_id: destination,
                    weight: totalWeight * 1000
                },
                headers: {
                    "Authorization": "Bearer " + $('meta[name="token"]').attr("content")
                },
                dataType: "json",
                success: function(response) {
                    let a = JSON.parse(response)
                    let expedition = `<option>${a.rajaongkir.results[0].name}</option>`;
                    $('.expedition').html(expedition);
                    let service = '<option>Pilih Paket</option>';
                    a.rajaongkir.results[0].costs.forEach((a, b) => {
                        service +=
                            `<option etd="${a.cost[0].etd}" name="${a.cost[0].value}">${a.service}</option>`
                    })
                    $(".package").html(service)
                    $(".package").change(function() {
                        $(".expeditionPrice").html("Rp. " + $(this).find(":selected").attr(
                            'name'))
                        $(".expeditionName").html(a.rajaongkir.results[0].name)
                        $(".expeditionDay").html("( " + $(this).find(":selected").attr(
                            'etd') + " Hari )")
                        let total = parseInt($(".total").attr("total")) + parseInt($(this).find(
                            ":selected").attr(
                            'name'))
                        $(".totalPrice").html(total)
                        let templateSubmit = '';
                        templateSubmit +=
                            `<input type="hidden" name="courer" value="${$(".expedition").find(":selected").text() }">
                               <input type="hidden" name="estimation" value="${$(this).find(":selected").attr('etd') }">
                               <input type="hidden" name="address" value="${$("#addressUser").find(":selected").val() }">
                               <input type="hidden" name="courer_price" value="${$(this).find(":selected").attr(
                            'name')}">`
                        $('#totalPurchase').html(templateSubmit)
                    })
                }
            });
        });
        $(".ConfrimModal").click(function() {
            $("#ConfirmPayment").modal("show")

        })
    </script>
@endpush
