<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\product;
use App\Models\order;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{

    public function edit_produk(Product $product)
    {
        $id_1 = 1;
        $id_2 = 2;
        $orders = order::all();
        $user = Auth::user();
        return view('edit_produk', ['user' => $user, 'orders' => $orders, 'product' => $product, 'id_1' => $id_1, 'id_2' => $id_2]);
    }
    public function update_produk(Request $request, product $product)
    {
        $request->validate([
            'nama' => 'required',
            'stok' => 'required',
            'harga' => 'required',
            'keterangan' => 'required',
            'link' => 'required',
        ]);

        product::where('id', $product->id)
            ->update([
                'nama' => $request->nama,
                'stok' => $request->stok,
                'harga' => $request->harga,
                'keterangan' => $request->keterangan,
                'link' => $request->link,
            ]);
        $id_1 = 1;
        $id_2 = 2;
        $orders = order::all();
        $user = Auth::user();
        return redirect('kelola_produk')->with('status', 'Data Sukses Diedit');
    }
    public function tambah_produk()
    {
        $id_1 = 1;
        $id_2 = 2;
        $orders = order::all();
        $user = Auth::user();
        $products = product::all();
        return view('tambah_produk', ['user' => $user, 'orders' => $orders, 'products' => $products, 'id_1' => $id_1, 'id_2' => $id_2]);
    }
    public function create_produk(Request $request)
    {

        $request->validate([
            'nama' => 'required',
            'stok' => 'required',
            'harga' => 'required',
            'keterangan' => 'required',
            'link' => 'required',
        ]);

        product::create([
            'nama' => $request->nama,
            'stok' => $request->stok,
            'harga' => $request->harga,
            'keterangan' => $request->keterangan,
            'link' => $request->link,
        ]);
        $id_1 = 1;
        $id_2 = 2;
        $orders = order::all();
        $user = Auth::user();
        $products = product::all();
        return redirect('kelola_produk')->with('status', 'Data Sukses Ditambahkan');
    }
    public function destroy_produk($id)
    {
        product::destroy($id);
        $id_1 = 1;
        $id_2 = 2;
        $orders = order::all();
        $user = Auth::user();
        $products = product::all();
        return redirect('kelola_produk')->with('status', 'Data Sukses Dihapus');
    }
    public function admin_login()
    {
        $id_1 = 1;
        $id_2 = 2;
        $orders = order::all();
        $products = product::all();
        return view('admin_dashboard', ['orders' => $orders, 'products' => $products, 'id_1' => $id_1, 'id_2' => $id_2]);
    }
    public function admin_dashboard()
    {
        $id_1 = 1;
        $id_2 = 2;
        $orders = order::all();
        $user = Auth::user();
        $products = product::all();
        return view('admin_login', ['user' => $user, 'orders' => $orders, 'products' => $products, 'id_1' => $id_1, 'id_2' => $id_2]);
    }
    public function kelola_produk()
    {
        $id_1 = 1;
        $id_2 = 2;
        $orders = order::all();
        $user = Auth::user();
        $products = product::all();
        return view('kelola_produk', ['user' => $user, 'orders' => $orders, 'products' => $products, 'id_1' => $id_1, 'id_2' => $id_2]);
    }
    public function kelola_pemesanan()
    {
        $id_1 = 1;
        $id_2 = 2;
        $orders = order::all();
        $user = Auth::user();
        $products = product::all();
        return view('kelola_pemesanan', ['user' => $user, 'orders' => $orders, 'products' => $products, 'id_1' => $id_1, 'id_2' => $id_2]);
    }


    // user dan admin

    public function destroy_pemesanan(order $order)
    {
        order::destroy($order->id);
        $nama = "stok+" . $order->jumlah_order;

        Product::where('nama', $order->nama_order)
            ->update([
                'stok' => DB::raw($nama)
            ]);
        $id_1 = 1;
        $id_2 = 2;
        $orders = order::all();
        $user = Auth::user();
        $products = product::all();
        if ($user->id <= 2) {
            return redirect('kelola_pemesanan')->with('status', 'Data Sukses Dihapus');
        } else {
            return redirect('pemesanan')->with('status', 'Data Sukses Dihapus');
        }
    }

    public function edit_pemesanan(Order $order)
    {
        $provinsi = $this->get_province();
        $id_1 = 1;
        $id_2 = 2;
        $products = product::all();
        $user = Auth::user();
        if ($user->id <= 2) {
            return view('edit_pemesanan_admin', ['provinsi' => $provinsi, 'user' => $user, 'order' => $order, 'products' => $products, 'id_1' => $id_1, 'id_2' => $id_2]);
        } else {
            return view('edit_pemesanan_user', ['provinsi' => $provinsi, 'user' => $user, 'order' => $order, 'products' => $products, 'id_1' => $id_1, 'id_2' => $id_2]);
        }
    }

    public function update_pemesanan(Request $request, Order $order)
    {


        $nama = "stok+" . $order->jumlah_order;

        Product::where('nama', $order->nama_order)
            ->update([
                'stok' => DB::raw($nama)
            ]);


        $nama = "stok-" . $request->jumlah_order;

        Product::where('nama', $request->nama_order)
            ->update([
                'stok' => DB::raw($nama)
            ]);

        $user = Auth::user();
        $stok = DB::table('products')->where('nama', $order->nama_order)->value('stok');
        if ($stok < 0) {

            $nama = "stok-" . $order->jumlah_order;

            Product::where('nama', $order->nama_order)
                ->update([
                    'stok' => DB::raw($nama)
                ]);

            $nama = "stok+" . $request->jumlah_order;

            Product::where('nama', $request->nama_order)
                ->update([
                    'stok' => DB::raw($nama)
                ]);

            if ($user->id <= 2) {
                return redirect('kelola_pemesanan')->with('status', 'Pemesanan Gagal Diupdate,stok kurang');
            } else {
                return redirect('pemesanan')->with('status', 'Pemesanan Gagal Diupdate,stok kurang');
            }
        }

        $request->validate([
            "nama_order" => 'required',
            "harga_order" => 'required',
            "jumlah_order" => 'required',
            "address" => 'required',
            "nama_provinsi" => 'required',
            "nama_kota" => 'required',
            "kode_pos" => 'required',
            "weight" => 'required',
            "nama_kurir" => 'required',
            "nama_layanan" => 'required',
            "Totalan_order" => 'required',
            "resi" => 'required',
            "status_pembayaran" => 'required',
            "status_pengiriman" => 'required',
        ]);

        $order::where('id', $order->id)
            ->update([
                "nama_order" => $request->nama_order,
                "harga_order" => $request->harga_order,
                "jumlah_order" => $request->jumlah_order,
                "address" => $request->address,
                "nama_provinsi" => $request->nama_provinsi,
                "nama_kota" => $request->nama_kota,
                "kode_pos" => $request->kode_pos,
                "weight" => $request->weight,
                "nama_kurir" => $request->nama_kurir,
                "nama_layanan" => $request->nama_layanan,
                "Totalan_order" => $request->Totalan_order,
                "resi" => $request->resi,
                "status_pembayaran" => $request->status_pembayaran,
                "status_pengiriman" => $request->status_pengiriman,
            ]);


        if ($user->id <= 2) {
            return redirect('kelola_pemesanan')->with('status', 'Pemesanan Sukses Diupdate');
        } else {
            return redirect('pemesanan')->with('status', 'Pemesanan Sukses Diupdate');
        }
    }

    // user
    public function pemesanan()
    {
        $id_1 = 1;
        $id_2 = 2;
        $orders = order::all();
        $user = Auth::user();
        $products = product::all();
        return view('pemesanan', ['user' => $user, 'orders' => $orders, 'products' => $products, 'id_1' => $id_1, 'id_2' => $id_2]);
    }
    public function produk()
    {
        $id_1 = 1;
        $id_2 = 2;
        $orders = order::all();
        $user = Auth::user();
        $products = product::all();
        return view('produk', ['user' => $user, 'orders' => $orders, 'products' => $products, 'id_1' => $id_1, 'id_2' => $id_2]);
    }
    public function store(Request $request)
    {
        // return($request);

        $request->validate([
            "nama_order" => 'required',
            "harga_order" => 'required',
            "jumlah_order" => 'required',
            "address" => 'required',
            "nama_provinsi" => 'required',
            "nama_kota" => 'required',
            "kode_pos" => 'required',
            "weight" => 'required',
            "nama_kurir" => 'required',
            "nama_layanan" => 'required',
            "Totalan_order" => 'required',
            "resi" => 'required',
            "status_pembayaran" => 'required',
            "status_pengiriman" => 'required',
        ]);

        $nama = "stok-" . $request->jumlah_order;

        Product::where('nama', $request->nama_order)
            ->update([
                'stok' => DB::raw($nama)
            ]);


        $user = Auth::user()->id;
        $order = order::create([
            "id_pengguna" => $user,
            "nama_order" => $request->nama_order,
            "harga_order" => $request->harga_order,
            "jumlah_order" => $request->jumlah_order,
            "address" => $request->address,
            "nama_provinsi" => $request->nama_provinsi,
            "nama_kota" => $request->nama_kota,
            "kode_pos" => $request->kode_pos,
            "weight" => $request->weight,
            "nama_kurir" => $request->nama_kurir,
            "nama_layanan" => $request->nama_layanan,
            "Totalan_order" => $request->Totalan_order,
            "resi" => $request->resi,
            "status_pembayaran" => $request->status_pembayaran,
            "status_pengiriman" => $request->status_pengiriman,
        ]);
        return redirect('checkout')->with('status', 'Pemesanan Sukses Ditambahkan');
    }
    public function get_province()
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.rajaongkir.com/starter/province",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                // "key: f2d8947b6a7bf5edaa107365786eeb46"
                "key: 21ea539defc7c0771cc4950c2a706e06"

            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            //ini kita decode data nya terlebih dahulu
            $response = json_decode($response, true);
            //ini untuk mengambil data provinsi yang ada di dalam rajaongkir resul
            $data_pengirim = $response['rajaongkir']['results'];
            return $data_pengirim;
        }
    }
    public function get_kota($id)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.rajaongkir.com/starter/city?&province=$id",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                // "key: f2d8947b6a7bf5edaa107365786eeb46"
                "key: 21ea539defc7c0771cc4950c2a706e06"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $response = json_decode($response, true);
            $data_kota = $response['rajaongkir']['results'];
            return json_encode($data_kota);
        }
    }
    public function get_post($idkota, $idprovinsi)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.rajaongkir.com/starter/city?id=$idkota&province=$idprovinsi",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                // "key: f2d8947b6a7bf5edaa107365786eeb46"
                "key: 21ea539defc7c0771cc4950c2a706e06"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $response = json_decode($response, true);
            $data_kota = $response['rajaongkir']['results'];
            return json_encode($data_kota);
        }
    }
    public function checkout()
    {

        $products = product::all();
        //memanggil function get_province
        $provinsi = $this->get_province();
        //mengarah kepada file checkout.blade.php yang ada di view
        return view('checkout', ['provinsi' => $provinsi, 'products' => $products]);
    }
    public function get_ongkir($origin, $destination, $weight, $courier)
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "origin=$origin&destination=$destination&weight=$weight&courier=$courier",
            CURLOPT_HTTPHEADER => array(
                "content-type: application/x-www-form-urlencoded",
                // "key: f2d8947b6a7bf5edaa107365786eeb46"
                "key: 21ea539defc7c0771cc4950c2a706e06"
            ),
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $response = json_decode($response, true);
            $data_ongkir = $response['rajaongkir']['results'];
            return json_encode($data_ongkir);
        }
    }
}
