<?php

use App\Enums\SessionStatus;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('mentoring_sessions', function (Blueprint $table) {
            $table->id();

            $table->string('session_code', 20)->unique(); // e.g. #SS-4201

            $table->foreignId('mentor_id')
                  ->constrained('users')
                  ->cascadeOnDelete();

            $table->foreignId('student_id')
                  ->constrained('users')
                  ->cascadeOnDelete();

            $table->foreignId('topic_id')
                  ->constrained('session_topics')
                  ->cascadeOnDelete();

            $table->dateTime('scheduled_at')->nullable(); // nullable for live sessions

            $table->timestamp('started_at')->nullable();
            $table->timestamp('ended_at')->nullable();
            $table->integer('duration_minutes')->nullable();

            $table->decimal('hourly_rate', 10, 2); // locked at booking time
            $table->decimal('amount', 10, 2);       // total charged

            $table->enum('status', array_column(SessionStatus::cases(), 'value'))
                  ->default(SessionStatus::Pending->value);

            $table->timestamp('cancelled_at')->nullable();
            $table->text('cancellation_reason')->nullable();
            $table->boolean('refunded')->default(false);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('mentoring_sessions');
    }
};
