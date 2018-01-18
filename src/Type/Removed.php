<?php
declare(strict_types=1);

namespace Ilex\ChangeLog\Type;

/**
 * Class Removed
 *
 * @package Ilex\ChangeLog\Type
 */
class Removed extends AbstractChangeType
{

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return 'Removed';
    }
}
