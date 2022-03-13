@extends('layouts.master')
@section('content')
    <div style="margin-top: 150px" class="container">
        <div class="my-3 row justify-content-end">
            <form action="{{ url('user/history') }}" method="get">
                <input name="date" style="color:grey;" type="date" class="datepicker">
                <button class="btn btn-outline-success my-2 my-sm-0 btn-sm ml-1" type="submit">Search</button>
            </form>
        </div>
        <table class="table" style="color:grey">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Status</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($total as $item)
                    <tr class="border-bottom ">
                        <th scope="row">{{ $loop->iteration + $total->firstItem() - 1 }}</th>
                        <td>{{ $item->created_at->isoFormat('D MMMM Y') }}</td>
                        <td>{{ $item->status }}</td>
                        <td><button onclick="showInfo({{ $item->id }})"
                                class="btn btn-warning text-white"><small>Lihat</small></button></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="row justify-content-center">

            {{ $total->links() }}
        </div>

    </div>

    <div class="modal fade bd-example-modal-lg modal-info" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="container">
                    <div class="col-10 mx-auto ">
                        <div class="col-12  border mb-5" style="margin-top: 50px;  border-radius:20px; color:grey">
                            <h6 class="text-center my-5 ">Payment Confirm</h6>
                            <div class="row justify-content-center pb-3 titleItems">
                                <div class="col-3 row justify-content-center "><b>Item</b></div>
                                <div class="col-3 row justify-content-center "><b></b></div>
                                <div class="col-3 row justify-content-center "><b>Qty</b></div>
                                <div class="col-3 row justify-content-center "><b>Total Price</b></div>
                            </div>

                            <div class="row justify-content-center courerInfo">

                            </div>
                            <div class="row justify-content-center ">
                                <div class="col-3 row justify-content-start my-2 expeditionName">Kode Unik</div>
                                <div class="col-3 row justify-content-start my-2 expeditionDay"></div>
                                <div class="col-3 row justify-content-start my-2"></div>
                                <div class="col-3 row justify-content-center my-2">
                                    Rp. <p class="uniqueCode"> </p>
                                </div>
                            </div>




                            <div class="border my-3"></div>
                            <small><b>Berat Total adalah <span class="totalWeight"></span>
                                    Kg</b></small>
                            <div class="row justify-content-center my-3">
                                <div class="col-3 row justify-content-center my-2"></div>
                                <div class="col-3 row justify-content-center my-2"></div>
                                <div class="col-3 row justify-content-center my-2">Total:</div>
                                <div class="col-3 row justify-content-center my-2 total">Rp.
                                    <p class="totalPrice"></p>
                                </div>
                            </div>
                            <div class="row justify-content-center my-3">
                                <div class="col-6 row justify-content-center my-2"><small>
                                        <span class="addressInfo"></span>
                                    </small></div>

                                <div class="col-3 row justify-content-center my-2"></div>
                                <div class="col-3 row justify-content-center my-2 total">
                                </div>
                            </div>
                            <div class="row justify-content-center my-3">
                                <div class="col-3 row justify-content-center my-2"></div>
                                <div class="col-3 row justify-content-center my-2 total"></div>
                            </div>

                            <div class="col-6 mx-auto row justify-content-center my-2"><small>* Batal otomatis hingga
                                    tanggal
                                    <b class="expiresDate"> </b></small>
                            </div>
                        </div>
                    </div>
                </div>
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
        function showInfo(id) {
            $.ajax({
                type: "POST",
                url: "{{ url('api/invoice') }}",
                data: {
                    id: id
                },
                headers: {
                    "Authorization": "Bearer " + $("meta[name='token']").attr('content')
                },
                dataType: "json",
                success: function(response) {
                    console.log(response);

                    if ($(".items")) {
                        $(".items").remove();
                    }
                    $(".modal-info").modal('show')
                    let total = response.total;
                    let totalProducts = response.totalProducts;
                    console.log(total);
                    console.log(totalProducts);
                    let templateItem = '';
                    totalProducts.forEach(a => {
                        templateItem += `     <div class="row justify-content-center my-3 items">
                        <div class="col-4 row justify-content-start ">${a.name}</div>
                                <div class="col-2 row justify-content-start "></div>
                                <div class="col-3 row justify-content-center ">${a.qty}</div>
                                <div class="col-3 row justify-content-center ">Rp. ${a.total_price}</div>
                                  </div>`
                    })
                    $(templateItem).insertAfter(".titleItems")
                    let templateCourer = `<div class="col-3 row justify-content-start my-2 expeditionName">${total.courer}
                                </div>
                                <div class="col-3 row justify-content-start my-2 expeditionDay">( ${total.estimation}
                                    Hari )
                                </div>
                                <div class="col-3 row justify-content-start my-2"></div>
                                <div class="col-3 row justify-content-center my-2">
                                    <p class="expeditionPrice">Rp. ${total.courer_price}</p>`
                    $(".courerInfo").html(templateCourer)
                    $(".totalPrice").text(total.all_total)
                    $(".uniqueCode").text(total.unique_code)
                    $(".totalWeight").text(total.weight);
                    $(".expiresDate").text(total.expires)
                    $(".addressInfo").text(total.address)

                },
                error: function(response) {
                    console.log("error");
                }
            });
        }
        $(function() {
                    $(.#datepicker " ).datepicker();
                    });
    </script>
@endpush
