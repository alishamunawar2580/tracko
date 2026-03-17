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
            $table->unsignedBigInteger('organization_id');
            $table->foreign('organization_id')->references('id')->on('organizations')->onDelete('cascade');
            // Basic Information
            $table->string('name');
            $table->string('sku')->unique();
            $table->string('category');
            $table->string('unit');
            $table->text('description')->nullable();

            // Pricing & Stock
            $table->decimal('purchase_price', 15, 2);
            $table->decimal('selling_price', 15, 2);
            $table->decimal('margin', 8, 2)->nullable();
            $table->integer('stock');
            $table->integer('min_stock')->nullable();

            // Supplier
            $table->unsignedBigInteger('supplier_id')->nullable();
            $table->string('supplier_name')->nullable();

            // Tax & Codes
            $table->decimal('tax_rate', 5, 2)->nullable();
            $table->string('barcode')->nullable();
            $table->string('hsn_code')->nullable();

            // Status & Flags
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->boolean('featured')->default(true);
            $table->boolean('track_stock')->default(true);
            $table->boolean('allow_backorder')->default(true);

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
