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
        Schema::create('asset_movement_within_colleges', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('area_of_allocation_id')->constrained('area_of_allocations')->onDelete('cascade')->onUpdate('cascade');
            $table->string('quantity');
            $table->string('college_name');
            $table->string('department');
            $table->string('area_of_allocation');
            $table->string('specific_area_of_allocation');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('asset_movement_within_colleges');
    }
};
