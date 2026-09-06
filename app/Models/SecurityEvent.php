<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SecurityEvent extends Model
{
    protected $fillable = [
        'session_code',
        'user_id',
        'participant_role',
        'detection_type',
        'detection_category',
        'raw_transcript',
        'matched_fragment',
        'source',
        'detected_at',
    ];

    protected $casts = [
        'detected_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
