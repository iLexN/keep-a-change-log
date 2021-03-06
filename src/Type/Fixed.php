<?php declare(strict_types = 1);

namespace Ilex\ChangeLog\Type;

/**
 * Class Fixed
 *
 * @package Ilex\ChangeLog\Type
 */
class Fixed extends AbstractChangeType
{
    public function getTitle(): string
    {
        return 'Fixed';
    }
}
