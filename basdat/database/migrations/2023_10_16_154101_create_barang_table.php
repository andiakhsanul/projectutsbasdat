<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarangTable extends Migration
{
    public function up()
    {
        Schema::create('barang', function (Blueprint $table) {
            $table->id('idbarang');
            $table->char('jenis', 1)->nullable();
            $table->string('nama', 45)->nullable();
            $table->unsignedBigInteger('idsatuan');
            $table->foreign('idsatuan')->references('idsatuan')->on('satuan')->onDelete('cascade');
            $table->integer('status')->default('1');
            $table->integer('harga')->nullable();

        });
    }

    public function down()
    {
        Schema::dropIfExists('barang');
    }
}
