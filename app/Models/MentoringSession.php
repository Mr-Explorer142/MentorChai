<?php

namespace App\Models;

use App\Enums\SessionStatus;
use Illuminate\Database\Eloquent\Model;

class MentoringSession extends Model
{
    protected $fillable = [
        'session_code',
        'mentor_id',
        'student_id',
        'topic_id',
        'scheduled_at',
        'started_at',
        'ended_at',
        'duration_minutes',
        'hourly_rate',
        'amount',
        'status',
        'cancelled_at',
        'cancellation_reason',
        'refunded',
    ];

    protected $casts = [
        'scheduled_at' => 'datetime',
        'started_at'   => 'datetime',
        'ended_at'     => 'datetime',
        'cancelled_at' => 'datetime',
        'status'       => SessionStatus::class,
    ];

    public function mentor()
    {
        return $this->belongsTo(User::class, 'mentor_id');
    }

    public function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }

    public function topic()
    {
        return $this->belongsTo(SessionTopic::class, 'topic_id');
    }

    public function payment()
    {
        return $this->hasOne(Payment::class, 'session_id');
    }

    // Auto-generate session code like SS-4201
    public static function generateCode(): string
    {
        return 'SS-' . strtoupper(substr(uniqid(), -4));
    }
}
