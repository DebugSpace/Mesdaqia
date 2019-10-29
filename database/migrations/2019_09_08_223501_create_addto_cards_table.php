<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddtoCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addto_cards', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('productid')->nullable();
            $table->integer('ownerID')->nullable();
            $table->text('image')->nullable();
            $table->string('type')->nullable();
            $table->integer('price')->nullable();
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
        Schema::dropIfExists('addto_cards');
    }
}
