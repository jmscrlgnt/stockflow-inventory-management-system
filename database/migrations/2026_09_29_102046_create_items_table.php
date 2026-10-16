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
        Schema::create('items', function (Blueprint $table) {
            $table->id();

            $table->string('item_code', 50)->unique();
            $table->string('name', 150);
            $table->string('category', 100);
            $table->string('warehouse_location', 100);

            $table->unsignedInteger('quantity')->default(0);
            $table->decimal('unit_price', 10, 2);
            $table->unsignedInteger('reorder_level')->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
