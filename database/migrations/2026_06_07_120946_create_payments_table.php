<?php

use App\Enums\PaymentMethod;
use App\Enums\PaymentStatus;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();

            $table->foreignId('session_id')
                  ->constrained('mentoring_sessions')
                  ->cascadeOnDelete();

            $table->foreignId('student_id')
                  ->constrained('users')
                  ->cascadeOnDelete();

            $table->foreignId('mentor_id')
                  ->constrained('users')
                  ->cascadeOnDelete();

            $table->decimal('amount', 10, 2);
            $table->decimal('platform_fee', 10, 2)->default(0.00);
            $table->decimal('mentor_earning', 10, 2)->default(0.00);

            $table->enum('method', array_column(PaymentMethod::cases(), 'value'));

            $table->string('transaction_id')->unique()->nullable();

            $table->enum('status', array_column(PaymentStatus::cases(), 'value'))
                  ->default(PaymentStatus::Pending->value);

            $table->timestamp('paid_at')->nullable();
            $table->timestamp('refunded_at')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
