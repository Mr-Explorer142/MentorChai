<?php

namespace App\Models;

use App\Enums\PaymentMethod;
use App\Enums\PaymentStatus;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'session_id',
        'student_id',
        'mentor_id',
        'amount',
        'platform_fee',
        'mentor_earning',
        'method',
        'transaction_id',
        'status',
        'paid_at',
        'refunded_at',
    ];

    protected $casts = [
        'paid_at'      => 'datetime',
        'refunded_at'  => 'datetime',
        'status'       => PaymentStatus::class,
        'method'       => PaymentMethod::class,
    ];

    public function session()
    {
        return $this->belongsTo(MentoringSession::class, 'session_id');
    }

    public function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }

    public function mentor()
    {
        return $this->belongsTo(User::class, 'mentor_id');
    }
}
