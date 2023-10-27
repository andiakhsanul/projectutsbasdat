<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoleTable extends Migration
{public function up(): void
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->id('id_role');
            $table->string('nama_role',100);
            //0: null(tidak digunakan) 1: ada
            $table->integer('status')->default('1');
            $table->timestamps();
 });
}
    public function down()
    {
        Schema::dropIfExists('role');
    }
}
