@extends('layouts.master')
@section('content')
    <div class="container border-bottom pb-5" style="margin-top: 150px; color:grey ">
        <h5 class="text-center">Info User</h1>

            <div class="form-group">
                <label>Nama Lengkap</label>
                <input type="text" name="name" class="form-control" aria-describedby=" emailHelp"
                    placeholder="Masukan Nama" value="{{ Auth::user()->name }}">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control" aria-describedby=" emailHelp"
                    placeholder="Masukan Email" value="{{ Auth::user()->email }}">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control" aria-describedby=" emailHelp"
                    placeholder="New Password">

            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Konfirmasi Password</label>
                <input name="confirmPassword" type="password" class="form-control" id="exampleInputPassword1"
                    placeholder="Password Confirm">
            </div>

            <div class="d-flex justify-content-center">
                <button id="updateform" class="btn btn-primary  px-5 ">Update</button>
            </div>

    </div>
    <div class="container mt-5" style="color: grey">
        <h5 class="text-center mb-5">Alamat</h5>
        <div class="row d-flex cardAddress tempAddress" style="font-size: 12px">

        </div>
    </div>


    <!-- Adress modal -->
    <div class="modal fade modalAddress" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="container">
                    <h5 class="text-center py-4">Tambahkan alamat baru</h5>
                    <form>
                        <div class="form-group">
                            <label>Nama Penerima: </label>
                            <input type="text" class="form-control addName" aria-describedby=" emailHelp"
                                placeholder="Masukan Nama Penerima">
                        </div>
                        <div class="form-group">
                            <label>Nomor Telepon:</label>
                            <input type="text" class="form-control addPhoneNumber" aria-describedby=" emailHelp"
                                placeholder="Masukan Nomor Telepon">
                        </div>
                        <div class="form-group">
                            <label for="">Nama Provinsi:</label>
                            <select class="form-control selectedprovinces addProvince" name="addProvince"
                                style="color:gray;">
                                @foreach ($provinces['rajaongkir']['results'] as $p)
                                    <option name="{{ $p['province_id'] }}">{{ $p['province'] }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Nama Kota:</label>
                            <select class="form-control citiesName addCity" style="color:gray;">
                                <option>
                                    Nama Kota
                                </option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Alamat Lengkap:</label>
                            <textarea class="form-control addAddress" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Kode Pos:</label>
                            <input type="number" class="form-control addPosCode" aria-describedby=" emailHelp"
                                placeholder="Masukan Kode Pos">
                        </div>
                        <div class="d-flex justify-content-center">

                            <button type="button" class="btn btn-primary my-5 mx-auto confirmAddAddress">Tambahkan
                                Alamat</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="nameModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Success</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body ">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-dismiss="modal">oke</button>
                </div>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-center">
        <button id="#btnaddress" class="btn btn-success py-2 btnaddress  my-5">+ Tambah Alamat Baru</button>
    </div>

    <!-- Button trigger modal -->
    {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
        Launch demo modal
    </button> --}}

    <!-- Modal -->
    <div class="modal fade" id="asd" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Yakin akan menghapus alamat?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-danger confirmDelete">Hapus</button>
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
        function destroy(id) {
            $('#asd').modal('show')
            $(".confirmDelete").click(function() {
                $.ajax({
                    type: "post",
                    url: "{{ url('api/address/delete') }}",
                    data: {
                        id
                    },
                    dataType: "json",
                    headers: {
                        "Authorization": "Bearer " + $('meta[name="token"]').attr('content')
                    },
                    success: function(response) {
                        console.log(response);
                        $("#asd").modal('hide')
                        show();
                    }
                });
            })
        }

        function show() {
            $.ajax({
                type: "get",
                url: "{{ url('api/address/show') }}",
                data: {},
                dataType: "json",
                headers: {
                    "Authorization": "Bearer " + $('meta[name="token"]').attr('content')
                },
                success: function(response) {
                    let template = ``;
                    response.forEach(a => {


                        template += ` <div class="col-4  d-flex flex-row justify-content-center mb-3">
                        <div class="col-11 border pb-3">
                    <div class="row justify-content-end">
                        <button onclick="destroy(${a.id})" class=" btn btn-danger py-0 px-2 mr-2 mt-2">x</button>
                    </div>
                    <div class="d-flex flex-column">
                        <small>Nama Penerima: ${a.receiver}</small>
                        <small>No Tlp: ${a.phone_number}</small>
                        <small>Provinsi: ${a.province}</small>
                        <small>Kota: ${a.city_name}</small>
                        <small>Alamat: ${a.complete_address}</small>
                    </div>
                    </div>
                     </div>`
                    })
                    $(".tempAddress").html(template)

                }
            });
        }
        show()

        $('#updateform').click(function() {
            console.log('sukses');
            $.ajax({
                type: "POST",
                url: "{{ url('api/change-password') }}",
                data: {
                    name: $('input[name="name"]').val(),
                    email: $('input[name="email"]').val(),
                    password: $('input[name="password"]').val(),
                    confirmpassword: $('input[name="confirmPassword"]').val()
                },
                headers: {
                    "Authorization": "Bearer " + $('meta[name="token"]').attr('content')
                },
                dataType: "json",
                success: function(response) {
                    if (response.nameSuccess) {
                        $('.modal-body').html(response.nameSuccess)
                        $('#nameModal').modal('show');
                    }
                    if (response.password) {
                        $('.modal-body').html(response.password)
                        $('#nameModal').modal('show');
                    }
                    if (response.errorPassword) {
                        $('.modal-title').html('Error')
                        $('.modal-body').html(response.errorPassword)
                        $('#nameModal').modal('show');
                    }
                }
            });
        })

        $('.btnaddress').click(function() {
            $('.modalAddress').modal('show')
            let province_id = '';
            $('.addProvince').change(function() {
                province_id = $('.addProvince').find(':selected').attr('name');
                $.ajax({
                    type: "POST",
                    url: "{{ url('api/getcity') }}",
                    data: {
                        province_id: province_id
                    },
                    headers: {
                        "Authorization": "Bearer " + $('meta[name="token"]').attr(
                            'content')
                    },
                    dataType: "json",
                    success: function(response) {
                        let results = JSON.parse(response)
                        let template = '';
                        results.rajaongkir.results.forEach((a, b) => {
                            template +=
                                `<option name="${a.city_id}">${a.type} ${a.city_name}</option>`
                        });
                        $('.addCity').html(template)
                    }
                });
            })
        })


        $('.confirmAddAddress').click(function() {
            $.ajax({
                type: "POST",
                url: "{{ url('api/address/create') }}",
                data: {
                    receiver: $('.addName').val(),
                    phone_number: $('.addPhoneNumber').val(),
                    province: $('.addProvince').find(':selected').val(),
                    province_id: $('.addProvince').find(':selected').attr('name'),
                    city: $('.addCity').find(':selected').val(),
                    city_id: $('.addCity').find(':selected').attr('name'),
                    complete_address: $(".addAddress").val(),
                    postalcode: $(".addPosCode").val()
                },
                headers: {
                    "Authorization": "Bearer " + $('meta[name="token"]').attr(
                        'content')
                },
                dataType: "json",
                success: function(response) {
                    $(".modalAddress").modal('hide')
                    show()
                }
            });

        })
    </script>
@endpush
