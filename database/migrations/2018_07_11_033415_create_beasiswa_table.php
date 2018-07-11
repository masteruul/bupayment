<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBeasiswaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('beasiswa', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('nama');
            $table->unsignedInteger('persentase')->default(0);
            $table->string('item_tagihan_kode_item');
            $table->string('santri_nak');
            $table->timestamps();

            $table->foreign('item_tagihan_kode_item')
                ->references('kode_item')
                ->on('item_tagihan')
                ->onDelete('set null');
            $table->foreign('santri_nak')
                ->references('nak')
                ->on('santri')
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
        Schema::dropIfExists('beasiswa');
    }
}
