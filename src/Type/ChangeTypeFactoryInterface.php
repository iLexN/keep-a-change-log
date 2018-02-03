<?php declare(strict_types = 1);

namespace Ilex\ChangeLog\Type;

interface ChangeTypeFactoryInterface
{
    public function create(int $type): TypeInterface;
}
