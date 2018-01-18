<?php

namespace Ilex\ChangeLog\Type;

/**
 * Class Deprecated
 *
 * @package Ilex\ChangeLog\Type
 */
class Deprecated extends AbstractChangeType
{

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return 'Deprecated';
    }
}
