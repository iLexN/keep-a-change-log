<?php declare(strict_types = 1);

namespace Ilex\ChangeLog\Type;

/**
 * Class Added
 *
 * @package Ilex\ChangeLog\Type
 */
class Added extends AbstractChangeType
{
    public function getTitle(): string
    {
        return 'Added';
    }
}
