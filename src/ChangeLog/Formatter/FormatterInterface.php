<?php

namespace Ilex\ChangeLog\Formatter;

use Ilex\ChangeLog\Release;

/**
 * Interface FormatterInterface
 *
 * @package Ilex\ChangeLog\Formatter
 */
interface FormatterInterface
{

    /**
     * @param string $title
     * @param string $description
     * @param array|Release[] $releases
     *
     * @return string
     */
    public function render(string $title, string $description, array $releases): string;
}