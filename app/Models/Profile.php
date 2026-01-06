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
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
