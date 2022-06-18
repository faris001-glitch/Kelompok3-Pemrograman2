<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Jurnal extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jurnal', function (Blueprint $table){
            $table->string('no_jurnal',15);
            $table->date('tgl_jurnal');
            $table->text('keterangan');
            $table->unsignedBigInteger('no_akun');
            $table->integer('debet');
            $table->integer('kredit');
            $table->unsignedBigInteger('no_bm');
            $table->unsignedBigInteger('no_bk');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
