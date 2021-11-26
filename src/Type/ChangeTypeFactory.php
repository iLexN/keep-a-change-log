<?php declare(strict_types = 1);

namespace Ilex\ChangeLog\Type;

/**
 * Class ChangeTypeFactory
 *
 * @package Ilex\ChangeLog\Type
 */
class ChangeTypeFactory implements ChangeTypeFactoryInterface
{

    /**
     * ADDED
     * @var int
     */
    public final const ADDED = 1;

    /**
     * CHANGED
     * @var int
     */
    public final const CHANGED = 2;

    /**
     * DEPRECATED
     * @var int
     */
    public final const DEPRECATED = 3;

    /**
     * REMOVED
     * @var int
     */
    public final const REMOVED = 4;

    /**
     * FIXED
     * @var int
     */
    public final const FIXED = 5;

    /**
     * SECURITY
     * @var int
     */
    public final const SECURITY = 6;

    public function create(int $type): TypeInterface
    {
        return match ($type) {
            //self::ADDED => new Added(),
            self::CHANGED => new Changed(),
            self:: DEPRECATED => new Deprecated(),
            self::REMOVED => new Removed(),
            self::FIXED => new Fixed(),
            self::SECURITY => new Security(),
            default => new Added(),
        };
    }
}
