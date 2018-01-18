<?php

namespace Ilex\ChangeLog\Formatter;

use Ilex\ChangeLog\Release;
use Ilex\ChangeLog\Type\TypeInterface;

/**
 * Class DefaultFormatter
 *
 * @package Ilex\ChangeLog\Formatter
 */
class DefaultFormatter implements FormatterInterface
{

    /**
     * @var string
     */
    private $links = '';

    /**
     * @var string
     */
    private $url;

    /**
     * DefaultFormatter constructor.
     *
     * @param string $url
     */
    public function __construct(string $url)
    {
        $this->url = $url;
    }

    /**
     * @param string $title
     * @param string $description
     *
     * @return string
     */
    private function renderTitle(string $title, string $description): string
    {
        return '# ' . $title . "\n" . $description . "\n\n";
    }

    /**
     * @return string
     */
    private function getLinks(): string
    {
        return $this->links;
    }

    /**
     * @param array|Release[] $releases
     *
     * @return string
     */
    private function renderReleases(array $releases): string
    {
        $out = '';
        foreach ($releases as $release) {
            $out .= $this->renderRelease($release);
            $nextRelease = next($releases);
            if ($nextRelease) {
                $this->renderLink($release, $nextRelease);
            }
        }
        return $out;
    }

    /**
     * @param Release $release
     *
     * @return string
     */
    private function renderRelease(Release $release): string
    {
        $string = '';
        $string .= "## [{$release->tag}] - $release->date" . "\n";
        $list = $release->getChangeList();
        foreach ($list as $change => $changes) {
            $string .= $this->renderChanges($changes);
        }
        return $string;
    }

    /**
     * @param TypeInterface $changes
     *
     * @return string
     */
    private function renderChanges(TypeInterface $changes): string
    {
        $string = "### {$changes->getTitle()}" . "\n";
        $listChange = $changes->getList();
        foreach ($listChange as $featureList) {
            $string .= "- {$featureList}" . "\n";
        }
        $string .= "\n";
        return $string;
    }

    /**
     * @param Release $release
     * @param Release $nextRelease
     */
    private function renderLink(Release $release, Release $nextRelease)
    {
        $link = "[{$release->tag}]: {$this->url}/{$nextRelease->tag}...{$release->tag} ";
        $this->links .= $link;
    }

    /**
     * @param string $title
     * @param string $description
     * @param array|Release[] $releases
     *
     * @return string
     */
    public function render(
        string $title,
        string $description,
        array $releases
    ): string {
        $out = $this->renderTitle($title, $description);
        $out .= $this->renderReleases($releases);
        $out .= $this->getLinks();
        return $out;
    }
}
