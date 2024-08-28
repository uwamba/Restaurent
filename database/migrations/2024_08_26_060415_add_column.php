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
        Schema::table('stocks', function (Blueprint $table) {
            $table->string('trans_type')->nullable();
            $table->string('management')->default('FIFO');
            $table->bigInteger('remain')->default(0);
            $table->date('out_date')->nullable();
            $table->string('approval')->default(0);
            $table->string('status')->default('in');

         });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('stocks', function($table) {
            $table->string('trans_type');
            $table->string('management');
            $table->bigInteger('remain');
            $table->date('out_date');
            $table->string('approval');
            $table->string('status');

        });
    }
};
