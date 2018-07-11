<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTagihanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tagihan', function (Blueprint $table) {
            $table->engine = 'InnoDB';           
            $table->increments('id');
            $table->unsignedInteger('nominal')->default(0);
            $table->unsignedInteger('kelas');
            $table->string('tagihan_kode_item');
            $table->unsignedInteger('tahun_ajaran_id');
            $table->timestamps();

            $table->foreign('tahun_ajaran_id')
                ->references('id')
                ->on('tahun_ajaran')
                ->onDelete('set null');
            
            $table->foreign('tagihan_kode_item')
                ->references('kode_item')
                ->on('item_tagihan')
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
        Schema::dropIfExists('tagihan');
    }
}
