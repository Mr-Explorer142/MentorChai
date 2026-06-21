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
            $table->string('nid_front')->nullable()->after('bio');
            $table->string('nid_back')->nullable()->after('nid_front');
            $table->string('student_id_front')->nullable()->after('nid_back');
            $table->string('student_id_back')->nullable()->after('student_id_front');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('profiles', function (Blueprint $table) {
            $table->dropColumn([
                'nid_front',
                'nid_back',
                'student_id_front',
                'student_id_back'
            ]);
        });
    }
};
