<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('timon_shop_orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('buy_option_id');
            $table->unsignedInteger('order_quantity');
            $table->decimal('order_price', 16, 0);

            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('timon_shop_users')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('timon_shop_products')->onDelete('cascade');
            $table->foreign('buy_option_id')->references('id')->on('timon_shop_buy_option_products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('timon_shop_orders');
    }
};
