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
        Schema::create('timon_shop_products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('product_name');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('supplier_id');
            $table->decimal('product_price', 16, 0);
            $table->unsignedInteger('product_quantity');
            $table->string('product_image')->nullable();
            $table->string('product_code')->unique();
            $table->string('product_decription');

            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('timon_shop_categories')->onDelete('cascade');
            $table->foreign('supplier_id')->references('id')->on('timon_shop_suppliers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('timon_shop_products');
    }
};
