<?php declare(strict_types = 1);

namespace Ilex\ChangeLog\Type;

/**
 * Class ChangeTypeFactory
 *
 * @package Ilex\ChangeLog\Type
 */
/**
 * Class ChangeTypeFactory
 *
 * @package Ilex\ChangeLog\Type
 */
class ChangeTypeFactory implements ChangeTypeFactoryInterface
{

    /**
     * ADDED
     */
    const ADDED = 1;

    /**
     * CHANGED
     */
    const CHANGED = 2;

    /**
     * DEPRECATED
     */
    const DEPRECATED = 3;

    /**
     * REMOVED
     */
    const REMOVED = 4;

    /**
     * FIXED
     */
    const FIXED = 5;

    /**
     * SECURITY
     */
    const SECURITY = 6;

    public function create(int $type): TypeInterface
    {
        switch ($type) {
            case self::ADDED:
                return new Added();
            case self::CHANGED:
                return new Changed();
            case self:: DEPRECATED:
                return new Deprecated();
            case self::REMOVED:
                return new Removed();
            case self::FIXED:
                return new Fixed();
            case self::SECURITY:
                return new Security();
            default:
                //todo: throw?
                return new Added();
        }
    }
}
