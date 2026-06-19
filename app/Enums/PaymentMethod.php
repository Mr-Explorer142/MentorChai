<?php

namespace App\Enums;

enum PaymentMethod : string
{
    case Bkash  = 'bkash';
    case Nagad  = 'nagad';
    case Rocket = 'rocket';
    case Card   = 'card';
    case Bank   = 'bank';
    case PathaoPay = 'pathaoPay';
}
