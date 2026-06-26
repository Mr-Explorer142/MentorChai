<?php

namespace App\Models;

use App\Enums\SessionStatus;
use Illuminate\Database\Eloquent\Model;

class SessionTopic extends Model
{
    protected $fillable = [
        'student_id',
        'mentor_id',
        'topic',
        'note',
        'duration_hours',
        'status',
        'approved_at',
    ];

    protected $casts = [
        'approved_at' => 'datetime',
        'status'      => SessionStatus::class,
    ];

    // The student who requested
    public function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }

    // The mentor being hired
    public function mentor()
    {
        return $this->belongsTo(User::class, 'mentor_id');
    }

    // The actual scheduled/paid mentoring session
    public function mentoringSession()
    {
        return $this->hasOne(MentoringSession::class, 'topic_id');
    }
}
