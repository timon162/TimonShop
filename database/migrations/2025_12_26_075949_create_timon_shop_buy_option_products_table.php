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
        Schema::create('timon_shop_buy_option_products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('buy_option_name');
            $table->string('buy_option_description');
            $table->decimal('buy_option_price', 16, 0);
            $table->unsignedBigInteger('product_id');

            $table->timestamps();

            $table->foreign('product_id')->references('id')->on('timon_shop_products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('timon_shop_buy_option_products');
    }
};
