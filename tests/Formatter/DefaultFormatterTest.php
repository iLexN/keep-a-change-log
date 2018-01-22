<?php

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
    private $formatter;

    protected function setUp()
    {
        $this->formatter = new DefaultFormatter('url');
    }


    public function testConstruct()
    {
        $return='';
        try {
            $return = getProperty($this->formatter, 'url');
        } catch (\ReflectionException $e) {
            $this->fail($e->getMessage());
        }
        $this->assertEquals('url', $return);
    }

    public function testRenderTitle()
    {
        $title = 'title';
        $description = 'description';
        $return='';
        try {
            $return = callMethod(
                $this->formatter,
                'renderTitle',
                [$title, $description]
            );
        } catch (\ReflectionException $e) {
            $this->fail($e->getMessage());
        }

        $expected = '# '.$title.\PHP_EOL.$description.\PHP_EOL.\PHP_EOL;
        $this->assertEquals($expected, $return);
    }

    public function testGetLinks()
    {
        $links = 'abc';
        $return = '';
        try {
            setProperty($this->formatter, 'links', $links);
            $return = callMethod($this->formatter, 'getLinks');
        } catch (\ReflectionException $e) {
            $this->fail($e->getMessage());
        }

        $this->assertEquals($links, $return);
    }

    public function testReleases()
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
            $return = callMethod(
                $this->formatter,
                'renderReleases',
                [[$release, $release2]]
            );
        } catch (\ReflectionException $e) {
            $this->fail($e->getMessage());
        }

        $expected = file_get_contents(__DIR__.'/expected/render-releases-result.md');
        $this->assertEquals($expected, $return);
    }

    public function testRelease()
    {
        $release = (new Release('tag', '2017-06-07'))
            ->added('1a')
            ->security('b')
            ->fixed('c');
        $return = '';
        try {
            $return = callMethod($this->formatter, 'renderRelease', [$release]);
        } catch (\ReflectionException $e) {
            $this->fail($e->getMessage());
        }

        $expected = file_get_contents(__DIR__.'/expected/render-release-result.md');
        $this->assertEquals($expected, $return);
    }

    public function testRenderChanges()
    {
        $add = new Added();
        $add->add('a');
        $add->add('b');
        $return = '';
        try {
            $return = callMethod($this->formatter, 'renderChanges', [$add]);
        } catch (\ReflectionException $e) {
            $this->fail($e->getMessage());
        }

        $expected = file_get_contents(__DIR__.'/expected/render-changes-result.md');
        $this->assertEquals($expected, $return);
    }

    public function testRenderLink()
    {
        $release = new Release('tag1', '2017-06-07');
        $release2 = new Release('tag2', '2017-05-07');
        $release3 = new Release('tag3', '2017-04-07');
        $return = '';
        try {
            callMethod($this->formatter, 'renderLink', [$release, $release2]);
            $return = getProperty($this->formatter, 'links');
        } catch (\ReflectionException $e) {
            $this->fail($e->getMessage());
        }

        $expected = '[tag1]: url/tag2...tag1'.\PHP_EOL;
        $this->assertEquals($expected, $return, 'Test 2 Tag');
        try {
            callMethod($this->formatter, 'renderLink', [$release2, $release3]);
            $return = getProperty($this->formatter, 'links');
        } catch (\ReflectionException $e) {
            $return = '';
            $this->fail($e->getMessage());
        }

        $expected .= '[tag2]: url/tag3...tag2'.\PHP_EOL;
        $this->assertEquals($expected, $return, 'Test 3 tag');
    }

    public function testRender()
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

        $result = $this->formatter->render(
            'This is title',
            'Very long description...',
            [
                $release,
                $release2,
                $release3,
            ]
        );
        $expected = file_get_contents(__DIR__.'/expected/render-result.md');
        $this->assertEquals($expected, $result);
    }
}
