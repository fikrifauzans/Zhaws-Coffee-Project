@extends('layouts.master')
@section('content')
    <div class="container">
        <div class="col-10 mx-auto ">
            <div class="col-12  border " style="margin-top: 150px;  border-radius:20px; color:grey">
                <h6 class="text-center my-5 ">Payment Confirm</h6>
                <div class="row justify-content-center pb-3 ">
                    <div class="col-3 row justify-content-center "><b>Item</b></div>
                    <div class="col-3 row justify-content-center "><b></b></div>
                    <div class="col-3 row justify-content-center "><b>Qty</b></div>
                    <div class="col-3 row justify-content-center "><b>Total Price</b></div>
                </div>
                @foreach ($total->total_products()->get() as $item)
                    <div class="row justify-content-center ">
                        <div class="col-3 row justify-content-start my-2">{{ $item->name }}</div>
                        <div class="col-3 row justify-content-center my-2"></div>
                        <div class="col-3 row justify-content-center my-2">{{ $item->qty }}</div>
                        <div class="col-3 row justify-content-center my-2">Rp. {{ $item->price }}</div>
                    </div>
                @endforeach


                <div class="row justify-content-center ">
                    <div class="col-3 row justify-content-start my-2 expeditionName">{{ $total->courer }}</div>
                    <div class="col-3 row justify-content-start my-2 expeditionDay">( {{ $total->estimation }} Hari )
                    </div>
                    <div class="col-3 row justify-content-start my-2"></div>
                    <div class="col-3 row justify-content-center my-2">
                        <p class="expeditionPrice">Rp. {{ $total->courer_price }}</p>
                    </div>
                </div>
                <div class="row justify-content-center ">
                    <div class="col-3 row justify-content-start my-2 expeditionName">Kode Unik</div>
                    <div class="col-3 row justify-content-start my-2 expeditionDay"></div>
                    <div class="col-3 row justify-content-start my-2"></div>
                    <div class="col-3 row justify-content-center my-2">
                        <p class="expeditionPrice">Rp. {{ $total->unique_code }}</p>
                    </div>
                </div>

                <div class="border my-3"></div>
                <small><b>Berat Total adalah <span class="totalWeight">{{ $total->weight }}</span> Kg</b></small>
                <div class="row justify-content-center my-3">
                    <div class="col-3 row justify-content-center my-2"></div>
                    <div class="col-3 row justify-content-center my-2"></div>
                    <div class="col-3 row justify-content-center my-2">Total:</div>
                    <div class="col-3 row justify-content-center my-2 total">Rp.
                        <p class="totalPrice">{{ $total->all_total }}</p>
                    </div>
                </div>
                <div class="row justify-content-center my-3">
                    <div class="col-3 row justify-content-center my-2"><small>
                            <span class="totalWeight">{{ $total->address }}</span>
                        </small></div>
                    <div class="col-3 row justify-content-center my-2"></div>
                    <div class="col-3 row justify-content-center my-2"></div>
                    <div class="col-3 row justify-content-center my-2 total">
                    </div>
                </div>
                <div class="row justify-content-center my-3">
                    <div class="col-3 row justify-content-center my-2"></div>
                    <div class="col-3 row justify-content-center my-2 total"></div>
                </div>

                <div class="col-6 mx-auto row justify-content-center my-2"><small>* Batal otomatis hingga tanggal
                        <b> {{ $total->expires->isoFormat('D MMMM Y') }}</b></small></div>
            </div>


        </div>
        <div style="color:grey">
            <h6 class="mt-5 text-center">Pilih Metode Pembayaran:</h6>
            <div class="d-flex justify-content-center">
                <div>
                    <img class="mr-5 pointer briImg" style="width:100px;height:100px; cursor: pointer;"
                        src="{{ asset('images/bri.svg') }}" alt="">
                </div>
                <div>
                    <img class="QrisImg" style="width:100px;height:100px; cursor: pointer;"
                        src="{{ asset('images/qris.svg') }}" alt="">
                </div>
            </div>
        </div>
        <div class="row justify-content-center mt-2 mb-3">
            <button class="btn btn-secondary mr-2 PaymentProof">Upload Bukti Pembayaran</button>
        </div>
    </div>



    <!-- Qris modal -->
    <div class="modal fade bd-example-modal-lg QrisModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <img src="" alt="">
            </div>
        </div>
    </div>
    <!-- Qris modal -->
    <div class="modal fade bd-example-modal-lg briModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="border-bottom">
                    <h6 class="text-center my-3">Payment Via BNI</h6>
                </div>
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-4 row justify-content-center">
                            <img class="mr-5 pointer briImg " style="width:100px;height:100px; cursor: pointer;"
                                src="{{ asset('images/bri.svg') }}" alt="">
                        </div>
                        <div class="col-8 border-left " style="color:grey">
                            <div class="mx-auto text-center my-3">
                                <p>AN / Fikri Fauzan Santosa</p>
                                <p>923891830380198301830810</p>
                            </div>

                        </div>

                    </div>
                </div>
            </div>


        </div>
    </div>
    </div>

    <!-- Proof Image modal -->
    <div class="modal fade bd-example-modal-lg PaymentModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content text-center" style="color:grey;">
                <div class="container-fluid">
                    <form id="upload-image" action="" enctype="multipart/form-data">
                        <div class=" py-5">
                            <h5>Upload bukti pembayaran</h5>
                        </div>
                        <div class="col-12">
                            <input type="file" name="image" class=" my-5 confrimPayment" data-max-width="400px" />
                            <span id="upload-error"></span>
                            <span class="text-success" id="upload-success"></span>
                            <input type="hidden" name="id" value="{{ $total->id }}">
                        </div>
                        <div class="col-4 mx-auto mt-3 mb-5">
                            <button class="btn-success btn mt-3 w-100">Submit</button>
                        </div>

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
        $(".briImg").click(function() {
            $(".briModal").modal("show")
        })
        $(".QrisImg").click(function() {
            $(".QrisModal").modal("show")
        })
        $(".PaymentProof").click(function() {
            $(".PaymentModal").modal("show")

        })

        $('.dropify').dropify();

        $('.confrimPayment').dropify({
            messages: {
                'default': 'Upload bukti pembayaran',
                'replace': 'Drag and drop or click to replace',
                'remove': 'Remove',
                'error': 'Ooops, something wrong happended.'
            }
        })
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                'Authorization': "Bearer " + $('meta[name="token"]').attr('content')
            }
        });

        $("#upload-image").submit(function(e) {
            e.preventDefault();
            let formData = new FormData(this);
            $("upload-error").text('');


            $.ajax({
                type: "POST",
                url: "{{ url('api/post-image') }}",
                data: formData,
                contentType: false,
                processData: false,
                dataType: "json",
                success: (response) => {
                    if (response) {
                        this.reset()
                        $("#upload-success").html("bukti pembayaran berhasil di upload")
                        // $(".PaymentModal").modal("hide");
                    }
                },
                error: function(e) {
                    console.log("gagal");
                }
            });
        });
    </script>
@endpush
