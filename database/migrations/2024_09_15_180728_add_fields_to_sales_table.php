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
        Schema::table('sales', function (Blueprint $table) {
            $table->after('customer_name', function () use ($table) {
                $table->longText('customer_address')->nullable();
                $table->string('customer_phone')->nullable();
                $table->string('customer_code')->nullable()->unique();
            });
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('sales', function (Blueprint $table) {
            $table->dropColumn('customer_address');
            $table->dropColumn('customer_phone');
            $table->dropColumn('customer_code');
        });
    }
};
