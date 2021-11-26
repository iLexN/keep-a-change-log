<?php declare(strict_types = 1);

namespace Ilex\ChangeLog\Type;

use Ilex\ChangeLog\Enum\ChangeType;

interface ChangeTypeFactoryInterface
{
    public function create(ChangeType $changeType): TypeInterface;
}
