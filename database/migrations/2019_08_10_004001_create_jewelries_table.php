<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJewelriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jewelries', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('type')->nullable();
            $table->string('material')->nullable();
            $table->string('gender')->nullable();
            $table->float('weight')->nullable();
            $table->float('price')->nullable();
            $table->integer('ownerID')->nullable();
            $table->string('new')->nullable();
            $table->string('Auction_type')->nullable();//نوع المزاد
            $table->string('location')->nullable();
            $table->boolean('Guarant')->nullable();
            $table->integer('viewers')->nullable();
            $table->text('image')->nullable();
            $table->text('status')->nullable();
            $table->timestamp('producttime')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jewelries');
    }
}
