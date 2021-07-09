<?php
declare(strict_types=1);

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

    private string $links = '';

    /**
     * DefaultFormatter constructor.
     */
    public function __construct(private string $url)
    {
    }

    private function renderTitle(string $title, string $description): string
    {
        return '# ' . $title . \PHP_EOL . $description . \PHP_EOL . \PHP_EOL;
    }

    private function getLinks(): string
    {
        return $this->links;
    }

    /**
     * @param array<int,Release> $releases
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

    private function renderRelease(Release $release): string
    {
        $string = sprintf('## [%s] - %s', $release->tag,
                $release->date) . \PHP_EOL;
        $list = $release->getChangeList();
        foreach ($list as $singleList) {
            $string .= $this->renderChanges($singleList);
        }
        return $string;
    }

    private function renderChanges(TypeInterface $type): string
    {
        $string = sprintf('### %s', $type->getTitle()) . \PHP_EOL;
        $listChange = $type->getList();
        foreach ($listChange as $singleListChange) {
            $string .= sprintf('- %s', $singleListChange) . \PHP_EOL;
        }
        return $string . \PHP_EOL;
    }

    private function renderLink(Release $release, Release $nextRelease): void
    {
        $link = sprintf('[%s]: %s/%s...%s', $release->tag, $this->url, $nextRelease->tag, $release->tag) . \PHP_EOL;
        $this->links .= $link;
    }

    /**
     * @param array<int,Release> $releases
     */
    public function render(
        string $title,
        string $description,
        array $releases
    ): string {
        //reset links
        $this->links = '';
        $out = $this->renderTitle($title, $description);
        $out .= $this->renderReleases($releases);
        $out .= $this->getLinks();
        return $out;
    }
}
