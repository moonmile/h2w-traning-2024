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
        // いったん消す
        Schema::dropIfExists('products');

        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('slug', 100)->nullable();
            $table->string('name', 100);
            $table->text('description')->nullable();
            $table->string('image', 100)->nullable();
            $table->decimal('price', 10, 2);
            $table->integer('sortid')->nullable();
            $table->boolean('display')->default(true);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
