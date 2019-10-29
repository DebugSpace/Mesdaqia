<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('type')->nullable();
            $table->string('area')->nullable();
            $table->string('street')->nullable();
            $table->string('city')->nullable();
            $table->integer('rental')->nullable();
            $table->string('new')->nullable();
            $table->text('status')->nullable();
            $table->integer('ownerID')->nullable();
            $table->integer('floors')->nullable();
            $table->integer('furnished')->nullable();
            $table->float('price')->nullable();
            $table->integer('rooms')->nullable();
            $table->float('SizeInMeter')->nullable();
            $table->string('Auction_type')->nullable();//نوع المزاد
            $table->string('location')->nullable();
            $table->boolean('Guarant')->nullable();
            $table->integer('viewers')->nullable();
            $table->text('image')->nullable();
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
        Schema::dropIfExists('properties');
    }
}
