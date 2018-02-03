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
     * @var array
     */
    public $list = [];

    public function add(string $description): void
    {
        $this->list[] = $description;
    }

    abstract public function getTitle(): string;

    /**
     * @return array
     */
    public function getList(): array
    {
        return $this->list;
    }
}
