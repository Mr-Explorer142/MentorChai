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
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('avatar')->nullable();
            $table->string('phone')->nullable();
            $table->text('bio')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('address')->nullable();
            $table->string('highgest_education_level')->nullable();
            $table->string('skills')->nullable();
            $table->string('institution_name')->nullable();
            $table->string('hourly_rate')->nullable();
            $table->string('department', 20)->nullable();
            $table->boolean('is_online')->default(false);
            $table->decimal('rating', 2, 1)->nullable();
            $table->integer('total_sessions')->default(0);
            $table->text('document_path')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
