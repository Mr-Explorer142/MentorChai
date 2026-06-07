<?php

use App\Enums\SessionStatus;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('session_topics', function (Blueprint $table) {
            $table->id();

            // Who is requesting (always a student)
            $table->foreignId('student_id')
                ->constrained('users')
                ->cascadeOnDelete();

            // Who is being hired (always a mentor)
            $table->foreignId('mentor_id')
                ->constrained('users')
                ->cascadeOnDelete();

            // Selected topic from mentor's skills dropdown
            $table->string('topic');

            // Session status
            $table->enum('status', array_column(SessionStatus::cases(), 'value'))
                ->default(SessionStatus::Pending->value);

            // When mentor approved the session
            $table->timestamp('approved_at')->nullable();

            $table->timestamps(); // created_at, updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('session_topics');
    }
};
