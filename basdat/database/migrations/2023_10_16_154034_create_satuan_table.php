<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSatuanTable extends Migration
{
    public function up()
    {
        Schema::create('satuan', function (Blueprint $table) {
            $table->id('idsatuan');
            $table->string('nama_satuan', 45)->nullable();
            $table->integer('status')->default('1');
        });
    }

    public function down()
    {
        Schema::dropIfExists('satuan');
    }
}
