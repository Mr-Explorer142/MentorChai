<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Add 'ended_by_admin' to the ENUM values for the status column
        DB::statement("ALTER TABLE session_topics MODIFY COLUMN status ENUM('pending', 'approved', 'ongoing', 'rejected', 'completed', 'ended_by_admin') DEFAULT 'pending'");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("ALTER TABLE session_topics MODIFY COLUMN status ENUM('pending', 'approved', 'ongoing', 'rejected', 'completed') DEFAULT 'pending'");
    }
};
