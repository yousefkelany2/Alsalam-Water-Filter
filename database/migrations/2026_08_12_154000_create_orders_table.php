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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_number')->unique();

            $table->string('customer_name');
            $table->string('customer_phone');
            $table->string('customer_email')->nullable();

            $table->foreignId('governorate_id')->constrained('governorates')->cascadeOnDelete();
            $table->string('city');
            $table->text('address');
            $table->text('notes')->nullable();

            $table->string('payment_method')->default('cash_on_delivery');
            $table->decimal('subtotal', 10, 2)->default(0);
            $table->decimal('shipping', 8, 2)->default(0);
            $table->decimal('discount', 8, 2)->default(0);
            $table->decimal('total', 10, 2)->default(0);

            $table->enum('status', ['pending', 'processing', 'delivered', 'cancelled'])->default('pending');

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
