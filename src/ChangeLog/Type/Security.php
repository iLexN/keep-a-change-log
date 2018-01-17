<?php

namespace Ilex\ChangeLog\Type;

/**
 * Class Security
 *
 * @package Ilex\ChangeLog\Type
 */
class Security extends AbstractChangeType
{

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return 'Fixed';
    }
}