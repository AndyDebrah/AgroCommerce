<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->string('name') ->nullable();
            $table->string('email') ->nullable();
            $table->integer('phone') ->nullable();
            $table->string('address')->nullable(); // Add this column if it is missing
            $table->string('productTitle') ->nullable();
            $table->integer('quantity') ->nullable();
            $table->integer('price') ->nullable();
            $table->string('image') ->nullable();
            $table->string('productId') ->nullable();
            $table->string('userId') ->nullable();
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
        Schema::dropIfExists('carts');
    }
};
