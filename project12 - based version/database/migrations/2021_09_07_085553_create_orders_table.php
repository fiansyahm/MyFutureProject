<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateordersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('id_pengguna');
            $table->string("nama_order");
            $table->string("harga_order");
            $table->string("jumlah_order");
            $table->string("address");
            $table->string("nama_provinsi");
            $table->string("nama_kota");
            $table->string("kode_pos");
            $table->integer("weight");
            $table->string("nama_kurir");
            $table->string("nama_layanan");
            $table->integer("Totalan_order");
            $table->string("resi");
            $table->string("status_pembayaran");
            $table->string("status_pengiriman");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}


