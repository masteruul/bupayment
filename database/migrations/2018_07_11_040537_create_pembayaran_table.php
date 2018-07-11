<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePembayaranTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembayaran', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id')->primarykey();
            $table->unsignedInteger('jumlah_bayar')->default(0);
            $table->timestamp('tanggal');
            $table->string('santri_nak');
            $table->timestamps();

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
        Schema::dropIfExists('pembayaran');
    }
}
