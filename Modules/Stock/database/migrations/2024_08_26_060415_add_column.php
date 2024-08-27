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
            $table->string('trans_type');
            $table->string('managemnt');
            $table->bigInteger('remain');
            $table->date('out_date');
            $table->string('approval');
            $table->string('status');

         });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('stocks', function($table) {
            $table->string('trans_type');
            $table->string('managemnt');
            $table->bigInteger('remain');
            $table->date('out_date');
            $table->string('approval');
            $table->string('status');

        });
    }
};
