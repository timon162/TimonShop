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
        Schema::create('timon_shop_suppliers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('supplier_name');
            $table->string('supplier_image');
            $table->boolean('supplier_is_hot');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('timon_shop_suppliers');
    }
};
