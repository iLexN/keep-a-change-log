<?php declare(strict_types = 1);

namespace Ilex\ChangeLog\Type;

/**
 * Interface InterfaceType
 *
 * @package Ilex\ChangeLog\Type
 */
interface TypeInterface
{
    public function add(string $description): void;

    /**
     * get the title of the change
     *
     * @return string
     */
    public function getTitle(): string;

    /**
     * @return array
     */
    public function getList(): array;
}
