<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Profile extends Model
{

    protected $fillable = [
        'bio',
        'phone',
        'avatar',
        'date_of_birth',
        'address',
        'highgest_education_level',
        'skills',
        'institution_name',
        'hourly_rate',
        'department',
        'short_bio',
        'nid_front',
        'nid_back',
        'student_id_front',
        'student_id_back',
        'is_verified',
        'documents_submitted_at',
    ];

    protected $casts = [
        'documents_submitted_at' => 'datetime',
        'is_verified' => 'boolean',
    ];

    public function hasPendingDocuments(): bool
    {
        return ! $this->is_verified
            && $this->documents_submitted_at !== null
            && ($this->nid_front || $this->nid_back || $this->student_id_front || $this->student_id_back);
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
