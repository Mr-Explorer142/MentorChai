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
        if (\Illuminate\Support\Facades\DB::getDriverName() === 'sqlite') {
            return;
        }

        \Illuminate\Support\Facades\DB::statement("ALTER TABLE mentoring_sessions MODIFY COLUMN status ENUM('pending', 'approved', 'ongoing', 'rejected', 'completed', 'ended_by_admin') DEFAULT 'pending'");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (\Illuminate\Support\Facades\DB::getDriverName() === 'sqlite') {
            return;
        }

        \Illuminate\Support\Facades\DB::statement("ALTER TABLE mentoring_sessions MODIFY COLUMN status ENUM('pending', 'approved', 'ongoing', 'rejected', 'completed') DEFAULT 'pending'");
    }
};
