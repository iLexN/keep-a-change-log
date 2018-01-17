<?php

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

    /**
     * @param string $description
     *
     * @return void
     */
    public function add(string $description)
    {
        $this->list[] = $description;
    }

    /**
     * @return string
     */
    abstract public function getTitle(): string;

    /**
     * @return array
     */
    public function getList(): array
    {
        return $this->list;
    }
}
