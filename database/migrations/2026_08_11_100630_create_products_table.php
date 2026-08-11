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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained('categories')->cascadeOnDelete();

            $table->string('sku')->unique()->nullable();

            $table->json('name');
            $table->json('description');
            $table->json('short_desc')->nullable();

            $table->decimal('price', 10, 2);
            $table->decimal('old_price', 10, 2)->nullable();
            $table->boolean('in_stock')->default(true);
            $table->integer('stock_qty')->default(0);

            $table->string('image')->nullable();
            $table->json('gallery')->nullable();

            $table->json('specifications')->nullable();
            $table->json('features')->nullable();
            $table->json('whats_included')->nullable();
            $table->json('warranty')->nullable();

            $table->decimal('rating', 3, 2)->default(0);
            $table->integer('review_count')->default(0);
            $table->integer('sales_count')->default(0);
            $table->boolean('featured')->default(false);
            $table->string('status')->default('active');

            $table->softDeletes();
            $table->timestamps();
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
