<?php
declare(strict_types=1);

namespace Ilex\ChangeLog\Enum;

enum ChangeType: int
{

    case ADDED = 1;

    case CHANGED = 2;

    case DEPRECATED = 3;

    case REMOVED = 4;

    case FIXED = 5;

    case SECURITY = 6;
}
