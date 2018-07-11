<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSantriHasBeasiswaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('santri_has_beasiswa', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('santri_nak');
            $table->unsignedInteger('beasiswa_id');
            $table->string('beasiswa_item_tagihan_kode_item');
            $table->timestamps();
            $table->foreign('santri_nak')
                ->references('nak')
                ->on('santri')
                ->onDelete('set null');
            $table->foreign('beasiswa_id')
                ->references('id')
                ->on('beasiswa')
                ->onDelete('set null');
            $table->foreign('beasiswa_item_tagihan_kode_item')
                ->references('item_tagihan_kode_item')
                ->on('beasiswa')
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
        Schema::dropIfExists('santri_has_beasiswa');
    }
}
