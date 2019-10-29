<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAuthVichlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('auth_vichles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('type')->nullable();
            $table->integer('year')->nullable();
            $table->string('model')->nullable();
            $table->string('vendor')->nullable();
            $table->string('color')->nullable();
            $table->string('new')->nullable();
            $table->text('status')->nullable();
            $table->integer('ownerID')->nullable();
            $table->float('price')->nullable();
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
        Schema::dropIfExists('auth_vichles');
    }
}
