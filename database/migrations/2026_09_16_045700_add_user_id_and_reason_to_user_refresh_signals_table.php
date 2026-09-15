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
        Schema::table('user_refresh_signals', function (Blueprint $table) {
            if (!Schema::hasColumn('user_refresh_signals', 'user_id')) {
                $table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade');
            }
            if (!Schema::hasColumn('user_refresh_signals', 'reason')) {
                $table->string('reason')->nullable();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('user_refresh_signals', function (Blueprint $table) {
            if (Schema::hasColumn('user_refresh_signals', 'user_id')) {
                $table->dropForeign(['user_id']);
                $table->dropColumn('user_id');
            }
            if (Schema::hasColumn('user_refresh_signals', 'reason')) {
                $table->dropColumn('reason');
            }
        });
    }
};
