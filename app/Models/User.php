<?php

namespace App\Models;

use App\Enums\UserRole;
use App\Enums\UserStatus;
use App\Models\Profile;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;

class User extends Authenticatable implements MustVerifyEmail
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'is_super_admin',
        'status',
        'banned_at',
        'banned_reason',
        'last_seen_at',
        'provider',
        'provider_id',
        'email_verified_at',
    ];


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'last_seen_at' => 'datetime',
            'password' => 'hashed',
            'role' => UserRole::class,
            'status' => UserStatus::class
        ];
    }

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    public function achievements()
    {
        return $this->hasMany(Achievement::class);
    }

    public function isAdmin(): bool
    {
        return $this->role === UserRole::Admin || $this->role === UserRole::SuperAdmin;
    }

    public function isSuperAdmin(): bool
    {
        return ($this->role === UserRole::Admin && (bool) $this->is_super_admin) || $this->role === UserRole::SuperAdmin;
    }

    public function isOnline()
    {
        return $this->last_seen_at && $this->last_seen_at >= now()->subMinutes(1);
    }

    public function lastSeenAgo()
    {
        return $this->last_seen_at->diffForHumans();
    }

    // Sessions where this user is the student
    public function sessionTopicsAsStudent()
    {
        return $this->hasMany(SessionTopic::class, 'student_id');
    }

    // Sessions where this user is the mentor
    public function sessionTopicsAsMentor()
    {
        return $this->hasMany(SessionTopic::class, 'mentor_id');
    }

    // Mentoring Sessions, Payments

    public function mentoringSessions()
    {
        return $this->hasMany(MentoringSession::class, 'mentor_id');
    }

    public function studentSessions()
    {
        return $this->hasMany(MentoringSession::class, 'student_id');
    }

    public function payments()
    {
        return $this->hasMany(Payment::class, 'student_id');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class, 'mentor_id');
    }
}
