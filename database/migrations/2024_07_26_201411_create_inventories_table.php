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
        Schema::create('inventories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained('products')->references('id')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('warehouse_id')->constrained('warehouses')->references('id')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('location_id')->nullable()->constrained('locations')->references('id')->onDelete('set null')->cascadeOnUpdate();
            $table->integer('quantity');
            $table->string('batch_lot_number')->nullable();
            $table->date('expiration_date')->nullable();
            $table->date('last_restocked')->nullable();
            $table->date('last_sold')->nullable();
            $table->integer('reorder_level')->nullable();
            $table->integer('minimum_quantity')->nullable();
            $table->integer('maximum_quantity')->nullable();
            $table->decimal('cost_price', 10, 2)->nullable();
            $table->decimal('selling_price', 10, 2)->nullable();
            $table->decimal('discount', 5, 2)->nullable();
            $table->decimal('total_value', 10, 2)->nullable();
            $table->text('notes');
            $table->string('tags');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventories');
    }
};
