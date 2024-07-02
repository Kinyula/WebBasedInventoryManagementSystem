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
        Schema::table('co_e_s_e_resources', function (Blueprint $table) {

            $table->string('allocation_status')->default('Not Allocated');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('co_e_s_e_resources', function (Blueprint $table) {
            //
        });
    }
};
