<?php

namespace Ilex\ChangeLog\Type;

/**
 * Interface InterfaceType
 *
 * @package Ilex\ChangeLog\Type
 */
interface TypeInterface
{

    /**
     * @param string $description
     *
     * @return void
     */
    public function add(string $description);

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