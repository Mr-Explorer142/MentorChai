<?php

namespace App\Enums;

enum SessionStatus : string
{
    case Pending = 'pending';
    case Approved = 'approved';
    case Ongoing   = 'ongoing';
    case Rejected = 'rejected';
    case Completed = 'completed';
}
