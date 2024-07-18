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
        Schema::table('co_e_d_resources', function (Blueprint $table) {
            $table->string('consumable_issue_status')->default('Not issued yet');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('co_e_d_resources', function (Blueprint $table) {
            //
        });
    }
};