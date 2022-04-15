<div class="card ml-3 mt-3">
    <div class="card-header">
        Order# {{$order->id}}
        <a href="/pemesanan/edit/{{$order->id}}" class="btn btn-success" style="margin-left: 800px;">Edit</a>
        <a href="/pemesanan/destroy/{{$order->id}}" class="btn btn-danger mx-3" >Hapus</a>
    </div>
    <div class="card-body">
        <div class="row justify-content-center">
            <div class="col">
                <div class="row">
                    <div class="col">
                        <div class="col">
                            <p><b>Pelanggan</b></p>
                        </div>
                        <div class="col">
                            <p>{{$user->name}}</p>
                        </div>
                        <div class="col">
                            <p><b>Telp</b></p>
                        </div>
                        <div class="col">
                            <p>-</p>
                        </div>
                        <div class="col">
                            <p><b>No Ref Pelanggan</b></p>
                        </div>
                        <div class="col">
                            <p>-</p>
                        </div>
                        <div class="col">
                            <p><b>Sumber</b></p>
                        </div>
                        <div class="col">
                            <p>-</p>
                        </div>
                        <div class="col">
                            <p><b>Catatan</b></p>
                        </div>
                        <div class="col">
                            <p>-</p>
                        </div>
                    </div>
                    <div class="col">
                        <div class="col">
                            <p><b>Item</b></p>
                        </div>
                        <div class="col">
                            <p>{{$order->nama_order}}</p>
                        </div>
                        <div class="col">
                            <p><b>Kurir</b></p>
                        </div>
                        <div class="col">
                            <p>{{$order->nama_kurir}}</p>
                        </div>
                        <div class="col">
                            <p><b>No Resi</b></p>
                        </div>
                        <div class="col">
                            <p>{{$order->resi}}</p>
                        </div>
                        <div class="col">
                            <p><b>Total</b></p>
                        </div>
                        <div class="col">
                            <p>{{$order->Totalan_order}}</p>
                        </div>
                        <div class="col">
                            <p><b>Catatan</b></p>
                        </div>
                        <div class="col">
                            <p>-</p>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-md-3">
                <div class="row">
                    <div class="col">
                        <div class="row">
                            <p><b>Status Pembayaran</b></p>
                        </div>
                        <div class="row">
                            <p>{{$order->status_pembayaran}}</p>
                        </div>
                    </div>
                    <div class="col">
                        <div class="row">
                            <p><b>Status Pengiriman</b></p>
                        </div>
                        <div class="row">
                            <p>{{$order->status_pengiriman}}</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="card-footer text-muted">
        Sukses Adalah Perjuangan
    </div>
</div>