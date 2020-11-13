<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModelSellingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('selling', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_book')->unsigned();
            $table->foreign('id_book')->references('id')->on('books')->onDelete('cascade')->onUpdate('cascade');
            $table->string('title');
            $table->double('selling_price');
            $table->integer('quantity');
            $table->string('payment_method');
            $table->string('customer_name');
            $table->string('status');
            $table->string('obs');
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
        Schema::dropIfExists('selling');
    }
}
