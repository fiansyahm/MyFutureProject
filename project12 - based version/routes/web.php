<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route Customer
use App\Http\Controllers\CheckOutController;

Route::post('/save', [CheckoutController::class, 'store']);
Route::get('/checkout', [CheckoutController::class, 'checkout']);
Route::get('/cekresi', [CheckoutController::class, 'cekresi']);
Route::get('/produk', [CheckoutController::class, 'produk']);
Route::get('/pemesanan', [CheckoutController::class, 'pemesanan']);
Route::get('province',[CheckoutController::class, 'get_province'])->name('province');
Route::get('/kota/{id}',[CheckoutController::class, 'get_kota']);
Route::get('/kota/{idkota}/{idprovinsi}',[CheckoutController::class, 'get_post']);
// "/kota/" + idkotaku +"/" + provinceid,
Route::get('/origin={city_origin}&destination={city_destination}&weight={weight}&courier={courier}',[CheckoutController::class, 'get_ongkir']);


//Route Admin product
Route::post('/produk/create', [CheckoutController::class, 'create_produk']);
Route::get('/produk/tambah', [CheckoutController::class, 'tambah_produk']);
Route::get('/produk/edit/{product}', [CheckoutController::class, 'edit_produk']);
Route::post('/produk/update/{product}', [CheckoutController::class, 'update_produk']);
Route::get('/wp-admin', [CheckoutController::class, 'admin_login']);
Route::get('/admin', [CheckoutController::class, 'admin_dashboard']);
Route::get('/kelola_pemesanan', [CheckoutController::class, 'kelola_pemesanan']);
Route::get('/pemesanan/destroy/{order}', [CheckoutController::class, 'destroy_pemesanan']);
Route::get('/pemesanan/edit/{order}', [CheckoutController::class, 'edit_pemesanan']);
Route::post('/pemesanan/update/{order}', [CheckoutController::class, 'update_pemesanan']);
Route::get('/kelola_produk', [CheckoutController::class, 'kelola_produk']);
Route::get('/kelola_admin', [CheckoutController::class, 'kelola_admin']);
Route::get('/produk/destroy/{id}', [CheckoutController::class, 'destroy_produk']);



Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('layouts/app');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';







// use Illuminate\Support\Facades\Auth;
// use App\Models\product;
// use App\Models\order;
// use Illuminate\Http\Request;
// Route::get('/produk', function () {
//     $products = product::all();
//     return view('produk', ['products' => $products]);
// });
// Route::get('/pemesanan', function () {
//     $orders = order::all();
//     $user = Auth::user();
//     return view('pemesanan', ['user' => $user, 'orders' => $orders]);
// });

// Route::post('/save', function (Request $request) {
//     $resi = 1234455;
//     $status_pembayaran = "terima";
//     $status_pengiriman = "kosong";

//     $user = Auth::user()->id;
//     $order = order::create([
//         "id_pengguna" => $user,
//         "nama_order" => $request->nama_order,
//         "harga_order" => $request->harga_order,
//         "jumlah_order" => $request->jumlah_order,
//         "address" => $request->address,
//         "nama_provinsi" => $request->nama_provinsi,
//         "nama_kota" => $request->nama_kota,
//         "kode_pos" => $request->kode_pos,
//         "weight" => $request->weight,
//         "nama_kurir" => $request->nama_kurir,
//         "nama_layanan" => $request->nama_layanan,
//         "Totalan_order" => $request->Totalan_order,
//         "resi" => $resi,
//         "status_pembayaran" => $status_pembayaran,
//         "status_pengiriman" => $status_pengiriman,
//     ]);
//     return redirect('dashboard');
// });

// Route::get('/', function () {
//     return view('welcome');
// });

// function get_province()
// {
//     $curl = curl_init();

//     curl_setopt_array($curl, array(
//         CURLOPT_URL => "https://api.rajaongkir.com/starter/province",
//         CURLOPT_RETURNTRANSFER => true,
//         CURLOPT_ENCODING => "",
//         CURLOPT_MAXREDIRS => 10,
//         CURLOPT_TIMEOUT => 30,
//         CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//         CURLOPT_CUSTOMREQUEST => "GET",
//         CURLOPT_HTTPHEADER => array(
//             "key: f2d8947b6a7bf5edaa107365786eeb46"
//         ),
//     ));

//     $response = curl_exec($curl);
//     $err = curl_error($curl);

//     curl_close($curl);

//     if ($err) {
//         echo "cURL Error #:" . $err;
//     } else {
//         //ini kita decode data nya terlebih dahulu
//         $response = json_decode($response, true);
//         //ini untuk mengambil data provinsi yang ada di dalam rajaongkir resul
//         $data_pengirim = $response['rajaongkir']['results'];
//         return $data_pengirim;
//     }
// }

// Route::get('/kota/{id}', function ($id) {
//     $curl = curl_init();
//     curl_setopt_array($curl, array(
//         CURLOPT_URL => "https://api.rajaongkir.com/starter/city?&province=$id",
//         CURLOPT_RETURNTRANSFER => true,
//         CURLOPT_ENCODING => "",
//         CURLOPT_MAXREDIRS => 10,
//         CURLOPT_TIMEOUT => 30,
//         CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//         CURLOPT_CUSTOMREQUEST => "GET",
//         CURLOPT_HTTPHEADER => array(
//             "key: f2d8947b6a7bf5edaa107365786eeb46"
//         ),
//     ));

//     $response = curl_exec($curl);
//     $err = curl_error($curl);

//     curl_close($curl);

//     if ($err) {
//         echo "cURL Error #:" . $err;
//     } else {
//         $response = json_decode($response, true);
//         $data_kota = $response['rajaongkir']['results'];
//         return json_encode($data_kota);
//     }
// });

// Route::get('/origin={city_origin}&destination={city_destination}&weight={weight}&courier={courier}', function ($city_origin, $city_destination, $weight, $courier) {
//     $curl = curl_init();
//     curl_setopt_array($curl, array(
//         CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
//         CURLOPT_RETURNTRANSFER => true,
//         CURLOPT_ENCODING => "",
//         CURLOPT_MAXREDIRS => 10,
//         CURLOPT_TIMEOUT => 30,
//         CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//         CURLOPT_CUSTOMREQUEST => "POST",
//         CURLOPT_POSTFIELDS => "origin=$city_origin&destination=$city_destination&weight=$weight&courier=$courier",
//         CURLOPT_HTTPHEADER => array(
//             "content-type: application/x-www-form-urlencoded",
//             "key: f2d8947b6a7bf5edaa107365786eeb46"
//         ),
//     ));
//     $response = curl_exec($curl);
//     $err = curl_error($curl);
//     curl_close($curl);
//     if ($err) {
//         echo "cURL Error #:" . $err;
//     } else {
//         $response = json_decode($response, true);
//         $data_ongkir = $response['rajaongkir']['results'];
//         return json_encode($data_ongkir);
//     }
// });

// Route::get('/checkout', function () {
//     $products = product::all();
//     //memanggil function get_province
//     $provinsi = get_province();
//     //mengarah kepada file checkout.blade.php yang ada di view
//     return view('checkout', ['provinsi' => $provinsi, 'products' => $products]);
// });




// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');
