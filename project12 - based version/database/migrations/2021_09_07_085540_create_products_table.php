<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->string("no_etalase");
            $table->string("merk");
            $table->string("warna");
            $table->string("lengan");
            $table->string("jenis");
            $table->string("ld");
            $table->string("pl");
            $table->string("berat");
            $table->string("minus");
            $table->string("status");
            $table->integer("stok");
            $table->integer("harga");
            $table->string("link")->nullable();
            $table->string('file_path')->nullable();
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
        Schema::dropIfExists('products');
    }
}
