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
        Schema::table('profiles', function (Blueprint $table) {
            $table->unsignedTinyInteger('teaching_experience_years')->nullable()->after('hourly_rate');
            $table->unsignedTinyInteger('teaching_experience_months')->nullable()->after('teaching_experience_years');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('profiles', function (Blueprint $table) {
            $table->dropColumn(['teaching_experience_years', 'teaching_experience_months']);
        });
    }
};
