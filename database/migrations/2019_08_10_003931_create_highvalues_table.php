<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHighvaluesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('highvalues', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('type')->nullable();
            $table->string('name')->nullable();
            $table->string('price')->nullable();
            $table->string('new')->nullable();
            $table->integer('ownerID')->nullable();
            $table->string('Auction_type')->nullable();//نوع المزاد
            $table->string('location')->nullable();
            $table->boolean('Guarant')->nullable();
            $table->integer('viewers')->nullable();
            $table->text('status')->nullable();
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
        Schema::dropIfExists('highvalues');
    }
}
