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
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('set null');
            $table->foreignId('shipping_address_id')->nullable()->constrained('shipping_addresses')->onDelete('set null');
            $table->string('invoice_number')->unique();
            $table->decimal('total_price', 12, 2);
            $table->decimal('shipping_cost', 12, 2);
            $table->decimal('grand_total', 12, 2);
            $table->string('courier')->nullable();
            $table->string('courier_service')->nullable();
            $table->string('receipt_number')->nullable();
            $table->enum('order_status', ['pending', 'processing', 'shipping', 'completed', 'canceled'])->default('pending');
            $table->enum('payment_status', ['unpaid', 'paid', 'failed', 'expired'])->default('unpaid');
            $table->string('payment_type')->nullable();
            $table->string('payment_url')->nullable();
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
