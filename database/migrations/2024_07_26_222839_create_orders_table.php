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
            $table->foreignId('customer_id')->nullable()->constrained('customers')->references('id')->onDelete('set null')->cascadeOnUpdate();
            $table->enum('status', ['Pending', 'Processing', 'Shipped', 'Delivered', 'Canceled']);
            $table->decimal('total_amount', 10, 2);
            $table->text('shipping_address')->nullable();
            $table->text('billing_address')->nullable();
            $table->string('payment_method');
            $table->enum('payment_status', ['Paid', 'Unpaid', 'Pending']);
            $table->string('shipping_method')->nullable();
            $table->decimal('shipping_cost', 10, 2)->nullable();
            $table->decimal('discount_amount', 10, 2)->nullable();
            $table->decimal('tax_amount', 10, 2)->nullable();
            $table->text('notes')->nullable();
            $table->string('transaction_id')->nullable();
            $table->timestamp('delivery_date')->nullable();
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
