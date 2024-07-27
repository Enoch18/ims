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
        Schema::create('locations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('warehouse_id')->constrained('warehouses')->references('id')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('code');
            $table->text('description');
            $table->string('storage_type')->nullable()->comment('This is the type of storage ie bin, shelf, rack, etc');
            $table->integer('capacity')->nullable()->comment('Number of inventory it can hold');
            $table->integer('current_usage')->nullable()->comment('The current number of goods that are there out of the capacity.');
            $table->integer('parent_location_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('locations');
    }
};
