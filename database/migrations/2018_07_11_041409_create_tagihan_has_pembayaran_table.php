<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTagihanHasPembayaranTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tagihan_has_pembayaran', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->unsignedInteger('tagihan_id');
            $table->string('tagihan_item_tagihan_kode_item');
            $table->unsignedInteger('tagihan_tahun_ajaran_id');
            $table->unsignedInteger('pembayaran_id');
            $table->string('pembayaran_santri_nak');
            $table->timestamps();

            $table->foreign('tagihan_id')
                ->references('id')
                ->on('tagihan')
                ->onDelete('set null');
            $table->foreign('tagihan_item_tagihan_kode_item')
                ->references('item_tagihan_kode_item')
                ->on('tagihan')
                ->onDelete('set null');
            $table->foreign('tagihan_tahun_ajaran_id')
                ->references('tahun_ajaran_id')
                ->on('tagihan')
                ->onDelete('set null');
            $table->foreign('pembayaran_id')
                ->references('id')
                ->on('pembayaran')
                ->onDelete('set null');
            $table->foreign('pembayaran_santri_nak')
                ->references('santri_nak')
                ->on('pembayaran')
                ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tagihan_has_pembayaran');
    }
}
