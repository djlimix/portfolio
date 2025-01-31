<?php

namespace App\Enums;

enum ProjectType: string {
    case Personal = 'personal';
    case Client = 'client';
    case ComingSoon = 'coming_soon';
}
