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
        Schema::create('medicines', function (Blueprint $table) { 
            $table->id(); 
            $table->string('seller'); 
            $table->string('image'); 
            $table->string('brand_option'); 
            $table->string('brand'); 
            $table->string('name'); 
            $table->text('brief')->nullable(); 
            $table->string('unit_of_measurement'); 
            $table->string('unit'); 
            $table->decimal('weight', 8, 2); 
            $table->string('weight_in'); 
            $table->string('tax_category'); 
            $table->decimal('mrp_b2b', 8, 2); 
            $table->decimal('mrp_b2c', 8, 2); 
            $table->decimal('mrp_b2d', 8, 2); 
            $table->decimal('b2c_price', 8, 2); 
            $table->decimal('b2b_price', 8, 2); 
            $table->decimal('b2b2c_price', 8, 2); 
            $table->string('collection')->nullable(); 
            $table->text('description')->nullable(); 
            $table->text('features')->nullable(); 
            $table->text('benefits')->nullable(); 
            $table->text('ingredients')->nullable(); 
            $table->text('additional_information')->nullable(); 
            $table->boolean('inventory_management')->default(false); 
            $table->boolean('inventory_allow_out_of_stock')->default(false); 
            $table->integer('inventory_quantity')->default(0); 
            $table->integer('inventory_low_stock_quality')->default(0); 
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medicines');
    }
};
