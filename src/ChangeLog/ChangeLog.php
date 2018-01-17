<?php

namespace Ilex\ChangeLog;

use Ilex\ChangeLog\Formatter\FormatterInterface;

/**
 * Class ChangeLog
 *
 * @package Ilex\ChangeLog
 */
class ChangeLog
{

    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $description;

    /**
     * @var FormatterInterface
     */
    private $formatter;

    /**
     * @var array
     */
    private $releases = [];

    /**
     * ChangeLog constructor.
     *
     * @param string $title
     * @param string $description
     * @param FormatterInterface $formatter
     */
    public function __construct(
        string $title,
        string $description,
        FormatterInterface $formatter
    ) {
        $this->title = $title;
        $this->description = $description;
        $this->formatter = $formatter;
    }

    /**
     * @param Release $release
     *
     * @return ChangeLog
     */
    public function addRelease(Release $release): self
    {
        $this->releases[] = $release;
        return $this;
    }

    /**
     * @return string
     */
    public function rand(): string
    {
        return $this->formatter->render(
            $this->title,
            $this->description,
            $this->releases
        );
    }
}
