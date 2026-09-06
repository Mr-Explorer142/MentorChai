<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('security_events', function (Blueprint $table) {
            $table->id();
            $table->string('session_code')->index();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('participant_role')->nullable(); // 'mentor' or 'student'
            $table->string('detection_type');              // phone_number, whatsapp, telegram, email, etc.
            $table->string('detection_category')->nullable(); // broader category for grouping
            $table->text('raw_transcript')->nullable();
            $table->text('matched_fragment')->nullable();
            $table->string('source')->default('audio');
            $table->timestamp('detected_at')->useCurrent();
            $table->timestamps();

            $table->index(['session_code', 'detected_at']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('security_events');
    }
};
