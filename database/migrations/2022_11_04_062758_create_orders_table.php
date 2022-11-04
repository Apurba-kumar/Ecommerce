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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->String('name')->nullable();
            $table->String('email')->nullable();
            $table->String('phone')->nullable();
            $table->String('address')->nullable();
            $table->String('user_id')->nullable();

            $table->String('product_title')->nullable();
            $table->String('quantity')->nullable();
            $table->String('price')->nullable();
            $table->String('image')->nullable();
            $table->String('product_id')->nullable();

            $table->String('payment_status')->nullable();
            $table->String('delivery_status')->nullable();

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
};
