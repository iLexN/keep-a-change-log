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
     */
    public function getTitle(): string;

    /**
     * @return array<int,string>
     */
    public function getList(): array;
}
