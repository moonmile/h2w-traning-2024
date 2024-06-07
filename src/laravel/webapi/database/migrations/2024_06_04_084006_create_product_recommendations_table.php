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

        Schema::create('product_recommendations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('store_id');
            $table->integer('store_sort')->nullable();
            $table->unsignedBigInteger('product_id');
            $table->string('image', 100)->nullable();
            $table->text('description')->nullable();
            $table->boolean('display')->default(true);
            $table->timestamps();
            $table->softDeletes();
            
            $table->foreign('store_id')->references('id')->on('stores');
            $table->foreign('product_id')->references('id')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_recommendations');
    }
};
