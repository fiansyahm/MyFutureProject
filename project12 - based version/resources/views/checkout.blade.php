@extends('layouts/index')

@section('head')

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>checkout</title>
</head>
@endsection

@section('isi')
<div class="container">

    <div class="row">
        <div class="col-md-12 my-3">
            <h2>Halaman Checkout</h2>
        </div>
        @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
        @endif
    </div>

    <form class="ps-checkout__form" action="/save" method="post">
        @csrf
        <div class="row">
            <div class="col-md-8">
                <!-- tambahan -->
                <div class="form-group form-group--inline">
                    <label for="namaorder">Nama order</label>
                    <select name="namaorder_id" id="namaorder_id" class="form-control">
                        <option value="">Nama order</option>
                        @foreach ($products as $row)
                        @if($row['stok']<1)
                            @continue
                        @endif
                        <option value="{{$row['harga']}}" nameorder="{{$row['nama']}}">{{$row['nama']}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <!-- hidden -->
                    <input type="hidden" class="form-control @error('nama_order') is-invalid @enderror" id="nama_order" name="nama_order" nama="nama_order" placeholder="ini untuk menangkap nama kota">
                    @error('nama_order')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="hargaorder1">Harga order</label>
                    <input type="text" class="form-control" id="harga_order1" name="harga_order1" nama="harga_order1" placeholder="harga order" disabled>
                </div>
                <div class="form-group">
                    <!-- hidden -->
                    <input type="hidden" class="form-control" id="harga_order" name="harga_order" nama="harga_order" placeholder="Harga">
                </div>

                <div class="form-group">
                    <label for="jumlahorder1">Jumlah order</label>
                    <select class="form-control" id="jumlah_order1" name="jumlah_order1">
                        <option value="">Pilih Jumlah</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </div>
                <div class="form-group">
                    <!-- hidden -->
                    <input type="hidden" class="form-control @error('jumlah_order') is-invalid @enderror" id="jumlah_order" name="jumlah_order" nama="harga_order" placeholder="Masukkan Jumlah order">
                    @error('jumlah_order')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <!-- city_id":"492","province_id":"11 -->

                <h3 class="mt-5 mb-5">Alamat Pengiriman</h3>
                <div class="form-group ">
                    <!-- <label>Provinsi asal</label> -->
                    <!-- hidden -->
                    <input type="hidden" value="11" class="form-control" name="province_origin">
                </div>
                <div class="form-group ">
                    <!-- <label>Kota Asal</label> -->
                    <!-- hidden -->
                    <input type="hidden" value="492" class="form-control" id="city_origin" name="city_origin">
                </div>
                <div class="form-group ">
                    <label>Alamat<span>*</span>
                    </label>
                    <textarea name="address" class="form-control @error('address') is-invalid @enderror" rows="5" placeholder="Alamat Lengkap pengiriman"></textarea>
                    @error('address')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group form-group--inline">
                    <label for="provinsi">Provinsi Tujuan</label>
                    <select name="province_id" id="province_id" class="form-control">
                        <option value="">Provinsi Tujuan</option>
                        @foreach ($provinsi as $row)
                        <option value="{{$row['province_id']}}" namaprovinsi="{{$row['province']}}">{{$row['province']}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <!-- hidden -->
                    <input type="hidden" class="form-control @error('nama_provinsi') is-invalid @enderror" id="nama_provinsi" name="nama_provinsi" nama="nama_provinsi" placeholder="ini untuk menangkap nama provinsi ">
                    @error('nama_provinsi')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group ">
                    <label>Kota Tujuan<span>*</span>
                    </label>
                    <select name="kota_id" id="kota_id" class="form-control">
                        <option value="">Pilih Kota</option>
                    </select>
                </div>
                <div class="form-group">
                    <!-- hidden -->
                    <input type="hidden" class="form-control @error('nama_kota') is-invalid @enderror" id="nama_kota" name="nama_kota" nama="nama_kota" placeholder="ini untuk menangkap nama kota">
                    @error('nama_kota')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="kodepos1">Kode Pos</label>
                    <input type="text" class="form-control" id="kode_pos1" name="kode_pos1" nama="kode_pos1" placeholder="kode pos" disabled>
                </div>
                <div class="form-group">
                    <!-- hidden -->
                    <input type="hidden" class="form-control" id="kode_pos" name="kode_pos" nama="kode_pos" placeholder="kode pos">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group ">
                    <label>total berat (gram) </label>
                    <input class="form-control" type="text" value="weight1" id="weight1" name="weight1" disabled>
                </div>
                <div class="form-group ">
                    <!-- hidden -->
                    <input type="hidden" class="form-control" value="weight" id="weight" name="weight">
                </div>
                <div class="form-group ">
                    <label>Pilih Ekspedisi<span>*</span>
                    </label>
                    <select name="kurir" id="kurir" class="form-control">
                        <option value="">Pilih kurir</option>
                        <option value="jne">JNE</option>
                        <option value="tiki">TIKI</option>
                        <option value="pos">POS INDONESIA</option>
                    </select>
                </div>
                <div class="form-group">
                    <!-- hidden -->
                    <input type="hidden" class="form-control @error('nama_kurir') is-invalid @enderror" id="nama_kurir" name="nama_kurir" nama="nama_kurir" placeholder="ini untuk menangkap nama kota">
                    @error('nama_kurir')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Pilih Layanan<span>*</span>
                    </label>
                    <select name="layanan" id="layanan" class="form-control">
                        <option value="">Pilih layanan</option>
                    </select>
                </div>

                <div class="form-group">
                    <!-- hidden -->
                    <input type="hidden" class="form-control @error('nama_layanan') is-invalid @enderror" id="nama_layanan" name="nama_layanan" nama="nama_layanan" placeholder="ini untuk menangkap nama kota">
                    @error('nama_layanan')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="Totalorder1">Total Harga</label>
                    <input type="text" class="form-control" id="Totalan_order1" name="Totalan_order1" nama="Totalan_order1" placeholder="total order" disabled>
                </div>
                <div class="form-group">
                    <!-- hidden -->
                    <input type="hidden" class="form-control" id="Totalan_order" name="Totalan_order" nama="Totalan_order" placeholder="total order">
                </div>

                <div class="form-group">
                    <input type="hidden" class="form-control" id="resi" name="resi" nama="resi" placeholder="resi" value="Belum Diupdate">
                </div>
                <div class="form-group">
                    <input type="hidden" class="form-control" id="status_pembayaran" name="status_pembayaran" nama="status_pembayaran" placeholder="status pembayaran" value="Belum Diupdate">
                </div>
                <div class="form-group">
                    <input type="hidden" class="form-control" id="status_pengiriman" name="status_pengiriman" nama="status_pengiriman" placeholder="status pengiriman" value="Belum Diupdate">
                </div>
                <div class="form-group">
                    <button class="btn btn-primary" type="submit">Proses product</button>
                </div>

            </div>
        </div>
    </form>
</div>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {
        // tambahan
        $('select[name="namaorder_id"]').on('change', function() {
            // membuat variable namaprovinsiku untyk mendapatkan atribut nama provinsi
            var namaorderku = $("#namaorder_id option:selected").text();
            var hargaorderku = $("#namaorder_id option:selected").val();
            // menampilkan hasil nama provinsi ke input id nama_provinsi
            $("#nama_order").val(namaorderku);
            $("#harga_order1").val(hargaorderku);
            $("#harga_order").val(hargaorderku);
             // tambahan
             $('select[name="layanan"]').empty();
             $("input[name=nama_layanan").val(null);
             
        });

        // tambahan
        $('select[name="jumlah_order1"]').on('change', function() {
            // membuat variable namaprovinsiku untyk mendapatkan atribut nama provinsi
            var jumlah_orderku1 = $("#jumlah_order1 option:selected").val();
            // menampilkan hasil nama provinsi ke input id nama_provinsi
            $("#jumlah_order").val(jumlah_orderku1);
            $("#weight1").val(jumlah_orderku1 * 160);
            $("#weight").val(jumlah_orderku1 * 160);
            $('select[name="layanan"]').empty();
            $("input[name=nama_layanan").val(null);
        });

        //ini ketika provinsi tujuan di klik maka akan eksekusi perintah yg kita mau
        //name select nama nya "provinve_id" kalian bisa sesuaikan dengan form select kalian
        $('select[name="province_id"]').on('change', function() {


            // tambahan
            $('select[name="layanan"]').empty();
            $("input[name=nama_layanan").val(null);

            // tambahan
            var jumlahorderku = $("input[name=jumlah_order]").val() * 160;
            // menampilkan hasil nama provinsi ke input id nama_provinsi
            $("#weight1").val(jumlahorderku);
            $("#weight").val(jumlahorderku);

            // membuat variable namaprovinsiku untyk mendapatkan atribut nama provinsi
            var namaprovinsiku = $("#province_id option:selected").attr("namaprovinsi");
            // menampilkan hasil nama provinsi ke input id nama_provinsi
            $("#nama_provinsi").val(namaprovinsiku);
            // kita buat variable provincedid untk menampung data id select province
            //memberikan action ketika select name kota_id di select
            //memberikan action ketika select name kota_id di select
            $('select[name="kota_id"]').on('change', function() {
                // tambahan
                $('select[name="layanan"]').empty();
                $("input[name=nama_layanan").val(null);

                // membuat variable namakotaku untyk mendapatkan atribut nama kota
                var namakotaku = $("#kota_id option:selected").attr("namakota");
                var idkotaku = $("#kota_id option:selected").attr("value");
                // menampilkan hasil nama provinsi ke input id nama_provinsi
                $("#nama_kota").val(namakotaku);

                // Tambahan
                jQuery.ajax({
                    // url yg di root yang kita buat tadi
                    url: "/kota/" + idkotaku + "/" + provinceid,
                    // aksion GET, karena kita mau mengambil data
                    type: 'GET',
                    // type data json
                    dataType: 'json',
                    // jika data berhasil di dapat maka kita mau apain nih
                    success: function(data) {
                        // jika tidak ada select dr provinsi maka select kota kososng / empty
                        $("#kode_pos1").val(data["postal_code"]);
                        $("#kode_pos").val(data["postal_code"]);
                    }
                });



            });
            let provinceid = $(this).val();
            //kita cek jika id di dpatkan maka apa yg akan kita eksekusi
            if (provinceid) {
                // jika di temukan id nya kita buat eksekusi ajax GET
                jQuery.ajax({
                    // url yg di root yang kita buat tadi
                    url: "/kota/" + provinceid,
                    // aksion GET, karena kita mau mengambil data
                    type: 'GET',
                    // type data json
                    dataType: 'json',
                    // jika data berhasil di dapat maka kita mau apain nih
                    success: function(data) {
                        // jika tidak ada select dr provinsi maka select kota kososng / empty
                        $('select[name="kota_id"]').empty();
                        // jika ada kita looping dengan each
                        $.each(data, function(key, value) {
                            // perhtikan dimana kita akan menampilkan data select nya, di sini saya memberi name select kota adalah kota_id
                            $('select[name="kota_id"]').append('<option value="' + value.city_id + '" namakota="' + value.type + ' ' + value.city_name + '">' + value.type + ' ' + value.city_name + '</option>');
                        });
                    }
                });

                $('select[name="kurir"]').on('change', function() {

                    //tambahan input nama kurir 
                    var kurirku = $("select[name=kurir]").val();
                    // menampilkan hasil nama provinsi ke input id nama_provinsi
                    $("#nama_kurir").val(kurirku);
                    // ssss

                    $('select[name="layanan"]').on('change', function() {
                        //tambahan input nama kurir 
                        // var layananku = "ja;p";
                        var layananku = $("#layanan option:selected").text();
                        // var layananku = $("input[name=layanan]").val();
                        // menampilkan hasil nama provinsi ke input id nama_provinsi
                        $("#nama_layanan").val(layananku);

                        a = layananku.split('-');
                        $a2 = a[2] * 1;
                        $cucu = $("#namaorder_id option:selected").val() * 1;
                        $cuci = $("input[name=jumlah_order]").val() * 1;
                        $kali = $cucu * $cuci + $a2;
                        $("#Totalan_order1").val($kali);
                        $("#Totalan_order").val($kali);

                        // ssss
                    });


                    // kita buat variable untuk menampung data data dari  inputan
                    // name city_origin di dapat dari input text name city_origin
                    let origin = $("input[name=city_origin]").val();
                    // name kota_id di dapat dari select text name kota_id
                    let destination = $("select[name=kota_id]").val();
                    // name kurir di dapat dari select text name kurir
                    let courier = $("select[name=kurir]").val();
                    // name weight di dapat dari select text name weight
                    let weight = $("input[name=weight]").val();
                    // alert(courier);
                    if (courier) {
                        jQuery.ajax({
                            url: "/origin=" + origin + "&destination=" + destination + "&weight=" + weight + "&courier=" + courier,
                            type: 'GET',
                            dataType: 'json',
                            success: function(data) {
                                $('select[name="layanan"]').empty();
                                // ini untuk looping data result nya
                                $.each(data, function(key, value) {
                                    // tambahanku
                                    $('select[name="layanan"]').append('<option value="' + key + '">' + 'Pilih Layanan' + '</option>');
                                    // ini looping data layanan misal jne reg, jne oke, jne yes
                                    $.each(value.costs, function(key1, value1) {
                                        // ini untuk looping cost nya masing masing
                                        // silahkan pelajari cara menampilkan data json agar lebi paham
                                        $.each(value1.cost, function(key2, value2) {
                                            $('select[name="layanan"]').append('<option value="' + key + '">' + value1.service + '-' + value1.description + '-' + value2.value + '</option>');
                                        });
                                    });
                                });

                            }
                        });



                    } else {
                        $('select[name="layanan"]').empty();
                    }

                });

            } else {
                $('select[name="kota_id"]').empty();
            }

        });


    });
</script>
<!-- <div class="form-group ">
        <label>Pilih Ekspedisi<span>*</span>
        </label>
        <select name="kurir" id="kurir" class="form-control">
            <option value="">Pilih kurir</option>
            <option value="jne">JNE</option>
            <option value="tiki">TIKI</option>
            <option value="pos">POS INDONESIA</option>
        </select>
    </div>
    <div class="form-group">
        <input type="text" class="form-control" id="nama_kurir" name="nama_kurir" nama="nama_kurir" placeholder="ini untuk menangkap nama kota">
    </div>
    <div class="form-group">
        <label>Pilih Layanan<span>*</span>
        </label>
        <select name="layanan" id="layanan" class="form-control">
            <option value="">Pilih layanan</option>
        </select>
    </div>
    <div class="form-group">
        <input type="text" class="form-control" id="nama_layanan" name="nama_layanan" nama="nama_layanan" placeholder="ini untuk menangkap nama kota">
    </div> -->
@endsection