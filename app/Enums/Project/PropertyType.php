<?php

namespace App\Enums\Project;

enum PropertyType:string
{
    case Land = 'Land';
    case Building = 'Building';
    case Apartment = 'Apartment';
    case Shop = 'Shop';
    case Office = 'Office';
    case Villa = 'Villa';
}
