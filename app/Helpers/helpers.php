<?php

use App\Enums\UserRole;
use Illuminate\Support\Facades\Auth;

// Mentor Helper Function
if (!function_exists('isMentor')) {
  function isMentor()
  {
    return Auth::check() && Auth::user()->role === UserRole::Mentor;
  }
}

// Student Helper Function
if(!function_exists('isStudent')) {
  function isStudent() {
    return Auth::check() && Auth::user()->role === UserRole::Student;
  }


}