<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->unsignedBigInteger('pesanan_milik')->nullable();
            $table->foreign('pesanan_milik')->references('id')->on('users')->onDelete('SET NULL');
            $table->date('tanggal');
            $table->integer('total_harga');
            $table->enum('status_cod', ['1', '2','3'])->default(1);
            $table->string('status_pembayaran',1)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
