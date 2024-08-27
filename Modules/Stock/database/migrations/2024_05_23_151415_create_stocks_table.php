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
        Schema::create('stocks', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('quantity');
            $table->bigInteger('total_quantity_before');
            $table->bigInteger('total_quantity_after');
            $table->bigInteger('unit_price');
            $table->bigInteger('total_value_before');
            $table->bigInteger('total_value_after');
            $table->bigInteger('total_price')->storedAs('unit_price * quantity');
            $table->bigInteger('consumable_id');
            $table->bigInteger('user_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stocks');
    }
};
