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
        Schema::table('users', function (Blueprint $table) {
            $table->after('is_active', function () use ($table) {
                $table->string('area')->nullable();
                $table->string('associate')->nullable();
                $table->string('delivered_by')->nullable();
            });
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('area');
            $table->dropColumn('associate');
            $table->dropColumn('delivered_by');
        });
    }
};
