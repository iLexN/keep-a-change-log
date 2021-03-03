<?php declare(strict_types = 1);

namespace Ilex\ChangeLog\Type;

/**
 * Class AbstractChangeType
 *
 * @package Ilex\ChangeLog\Type
 */
abstract class AbstractChangeType implements TypeInterface
{

    /**
     * @var array<int,string>
     */
    public array $list = [];

    public function add(string $description): void
    {
        $this->list[] = $description;
    }

    abstract public function getTitle(): string;

    /**
     * @return array<int,string>
     */
    public function getList(): array
    {
        return $this->list;
    }
}
