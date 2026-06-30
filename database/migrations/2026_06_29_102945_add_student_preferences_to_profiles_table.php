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
            if (!Schema::hasColumn('profiles', 'preferred_teaching_medium')) {
                $table->string('preferred_teaching_medium')->nullable();
            }
            if (!Schema::hasColumn('profiles', 'preferred_language')) {
                $table->string('preferred_language')->nullable();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('profiles', function (Blueprint $table) {
            $table->dropColumn(['preferred_teaching_medium', 'preferred_language']);
        });
    }
};
