<?php declare(strict_types = 1);

namespace Ilex\ChangeLog\Type;

use Ilex\ChangeLog\Enum\ChangeType;

/**
 * Class ChangeTypeFactory
 *
 * @package Ilex\ChangeLog\Type
 */
class ChangeTypeFactory implements ChangeTypeFactoryInterface
{
    public function create(ChangeType $changeType): TypeInterface
    {
        return match ($changeType) {
            ChangeType::CHANGED => new Changed(),
            ChangeType:: DEPRECATED => new Deprecated(),
            ChangeType::REMOVED => new Removed(),
            ChangeType::FIXED => new Fixed(),
            ChangeType::SECURITY => new Security(),
            default => new Added(),
        };
    }
}
