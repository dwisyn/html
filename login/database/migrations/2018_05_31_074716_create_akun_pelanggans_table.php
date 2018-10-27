<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAkunPelanggansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('akun_pelanggan', function (Blueprint $table) {
            $table->string('iduser');
            $table->primary('iduser');
            $table->integer('user_id')->index();
            $table->string('user')->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('jarak')->nullable();
            $table->string('pro');
            $table->string('idrumah_fk')->index();
            $table->timestamps();
        });

        Schema::table('akun_pelanggan',function($table){
        $table->foreign('idrumah_fk')
         ->references('idrumah')
             ->on('rumah')
             ->onUpdate('cascade')
             ->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('akun_pelanggan');
    }
}
