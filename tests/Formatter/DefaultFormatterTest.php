<?php declare(strict_types = 1);

namespace Ilex\ChangeLog\Tests\Formatter;

use Ilex\ChangeLog\Formatter\DefaultFormatter;
use Ilex\ChangeLog\Release;
use Ilex\ChangeLog\Type\Added;
use PHPUnit\Framework\TestCase;

class DefaultFormatterTest extends TestCase
{

    /**
     * @var DefaultFormatter
     */
    private $defaultFormatter;

    protected function setUp():void
    {
        $this->defaultFormatter = new DefaultFormatter('url');
    }


    public function testConstruct():void
    {
        $return='';
        try {
            $return = get_property($this->defaultFormatter, 'url');
        } catch (\ReflectionException $reflectionException) {
            self::fail($reflectionException->getMessage());
        }
        self::assertEquals('url', $return);
    }

    public function testRenderTitle(): void
    {
        $title = 'title';
        $description = 'description';
        $return='';
        try {
            $return = call_method(
                $this->defaultFormatter,
                'renderTitle',
                [$title, $description]
            );
        } catch (\ReflectionException $e) {
            self::fail($e->getMessage());
        }

        $expected = '# '.$title.\PHP_EOL.$description.\PHP_EOL.\PHP_EOL;
        self::assertEquals($expected, $return);
    }

    public function testGetLinks(): void
    {
        $links = 'abc';
        $return = '';
        try {
            set_property($this->defaultFormatter, 'links', $links);
            $return = call_method($this->defaultFormatter, 'getLinks');
        } catch (\ReflectionException $e) {
            self::fail($e->getMessage());
        }

        self::assertEquals($links, $return);
    }

    public function testReleases(): void
    {
        $release = (new Release('tag', '2017-06-07'))
            ->added('1a')
            ->security('b')
            ->fixed('c');
        $release2 = (new Release('tag', '2017-06-07'))
            ->added('1a')
            ->security('b')
            ->fixed('c');
        $return = '';
        try {
            $return = call_method(
                $this->defaultFormatter,
                'renderReleases',
                [[$release, $release2]]
            );
        } catch (\ReflectionException $e) {
            self::fail($e->getMessage());
        }

        $expected = file_get_contents(__DIR__.'/expected/render-releases-result.md');
        self::assertEquals($expected, $return);
    }

    public function testRelease(): void
    {
        $release = (new Release('tag', '2017-06-07'))
            ->added('1a')
            ->security('b')
            ->fixed('c');
        $return = '';
        try {
            $return = call_method($this->defaultFormatter, 'renderRelease', [$release]);
        } catch (\ReflectionException $e) {
            self::fail($e->getMessage());
        }

        $expected = file_get_contents(__DIR__.'/expected/render-release-result.md');
        self::assertEquals($expected, $return);
    }

    public function testRenderChanges(): void
    {
        $added = new Added();
        $added->add('a');
        $added->add('b');

        $return = '';
        try {
            $return = call_method($this->defaultFormatter, 'renderChanges', [$added]);
        } catch (\ReflectionException $e) {
            self::fail($e->getMessage());
        }

        $expected = file_get_contents(__DIR__.'/expected/render-changes-result.md');
        self::assertEquals($expected, $return);
    }

    public function testRenderLink(): void
    {
        $release = new Release('tag1', '2017-06-07');
        $release2 = new Release('tag2', '2017-05-07');
        $release3 = new Release('tag3', '2017-04-07');
        $return = '';
        try {
            call_method($this->defaultFormatter, 'renderLink', [$release, $release2]);
            $return = get_property($this->defaultFormatter, 'links');
        } catch (\ReflectionException $e) {
            self::fail($e->getMessage());
        }

        $expected = '[tag1]: url/tag2...tag1'.\PHP_EOL;
        self::assertEquals($expected, $return, 'Test 2 Tag');
        try {
            call_method($this->defaultFormatter, 'renderLink', [$release2, $release3]);
            $return = get_property($this->defaultFormatter, 'links');
        } catch (\ReflectionException $e) {
            $return = '';
            self::fail($e->getMessage());
        }

        $expected .= '[tag2]: url/tag3...tag2'.\PHP_EOL;
        self::assertEquals($expected, $return, 'Test 3 tag');
    }

    public function testRender(): void
    {
        $release = (new Release('tag', '2017-06-07'))
            ->added('1a')
            ->security('b')
            ->fixed('c');
        $release2 = (new Release('tag', '2017-06-07'))
            ->added('1a')
            ->security('b')
            ->fixed('c');
        $release3 = (new Release('tag', '2017-06-07'))
            ->deprecated('d')
            ->changed('e')
            ->security('f');

        $result = $this->defaultFormatter->render(
            'This is title',
            'Very long description...',
            [
                $release,
                $release2,
                $release3,
            ]
        );
        $expected = file_get_contents(__DIR__.'/expected/render-result.md');
        self::assertEquals($expected, $result);
    }
}
