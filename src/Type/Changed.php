<?php
declare(strict_types = 1);

namespace Ilex\ChangeLog\Type;

/**
 * Class Changed
 *
 * @package Ilex\ChangeLog\Type
 */
class Changed extends AbstractChangeType
{

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return 'Changed';
    }
}
