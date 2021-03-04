<?php
declare(strict_types = 1);

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
     * @param array<int,Release> $releases
     *
     */
    public function render(
        string $title,
        string $description,
        array $releases
    ): string;
}
