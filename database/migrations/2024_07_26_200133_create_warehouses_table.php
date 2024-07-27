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
        Schema::create('warehouses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('address');
            $table->string('city');
            $table->string('state');
            $table->string('postal_code')->nullable();
            $table->string('country');
            $table->string('phone_number');
            $table->string('email');
            $table->string('manager_name');
            $table->integer('capacity')->comment('Amount of inventory that the warehouse can hold');
            $table->integer('current_usage')->comment('The number of inventory that it currently has.');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('warehouses');
    }
};
