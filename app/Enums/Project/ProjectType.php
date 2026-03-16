<?php

namespace App\Enums\Project;

enum ProjectType:string
{
    case RESIDENTIAL = 'Residential';
    case COMMERCIAL = 'Commercial';
    case CLASSIC = 'Classic';
    case LUXARY = 'Luxary';
}
