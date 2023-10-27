<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserTable extends Migration
{
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id('id_user');
            $table->unsignedBigInteger('id_role');
            $table->foreign('id_role')->references('id_role')->on('roles')->onDelete('cascade');
            $table->string('username', 45);
            $table->string('password');
            $table->integer('status')->default('1');
        });
    }

    public function down()
    {
        Schema::dropIfExists('user');
    }
}
