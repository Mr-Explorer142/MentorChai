<?php

namespace App\Enums;

enum PaymentMethod : string
{
    case Bkash = 'bKash';
    case Nagad = 'nagad';
    case Rocket = 'rocket';
    case PathaoPay = 'pathaoPay';
    case Card  = 'card';
    case Bank  = 'bank';
}
