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
        Schema::create('counter_items', function (Blueprint $table) {
            $table->id();
            $table->string('item1_title')->nullable();
            $table->string('item1_number')->nullable();
            $table->string('item2_title')->nullable();
            $table->string('item2_number')->nullable();
            $table->string('item3_title')->nullable();
            $table->string('item3_number')->nullable();
            $table->string('item4_title')->nullable();
            $table->string('item4_number')->nullable();
            $table->string('status')->default('Show');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('counter_items');
    }
};
