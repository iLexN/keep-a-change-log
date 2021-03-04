<?php declare(strict_types = 1);

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
     * @var array<int,\Ilex\ChangeLog\Release>
     */
    private array $releases = [];

    /**
     * ChangeLog constructor.
     */
    public function __construct(private string $title, private string $description, private FormatterInterface $formatter)
    {
    }

    public function addRelease(Release $release): self
    {
        $this->releases[] = $release;
        return $this;
    }

    public function render(): string
    {
        return $this->formatter->render(
            $this->title,
            $this->description,
            $this->releases
        );
    }
}
