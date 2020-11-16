<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModelPurchasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_book')->unsigned();
            $table->foreign('id_book')->references('id')->on('books')->onDelete('cascade')->onUpdate('cascade');
            $table->string('title');
            $table->double('purchase_price', 10, 2)->nullable();
            $table->double('selling_price', 10, 2)->nullable();
            $table->integer('quantity');
            $table->string('store');
            $table->string('payment_method');
            $table->string('status');
            $table->string('order');
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
        Schema::dropIfExists('purchase');
    }
}
