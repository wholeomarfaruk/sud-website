<?php

namespace App\Enums\Project;

enum ProjectStatus:string
{
    case ONGOING = 'Ongoing';
    case COMPLETED = 'Completed';
    case UPCOMING = 'Upcoming';
}
