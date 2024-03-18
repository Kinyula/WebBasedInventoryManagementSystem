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
        Schema::create('resource_allocation_to_colleges', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('asset_id')->nullable()->constrained('assets')->onDelete('cascade')->onUpdate('cascade');
            $table->string('asset_quantity');
            $table->string('resource_allocated_college');
            $table->string('status')->default('Approved');
            $table->string('asset_status')->default('Functional');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('resource_allocation_to_colleges');
    }
};
