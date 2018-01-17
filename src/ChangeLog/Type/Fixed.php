<?php

namespace Ilex\ChangeLog\Type;

/**
 * Class Fixed
 *
 * @package Ilex\ChangeLog\Type
 */
class Fixed extends AbstractChangeType
{

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return 'Fixed';
    }
}