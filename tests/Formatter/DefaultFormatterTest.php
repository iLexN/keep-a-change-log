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
        $this->assertEquals('url', getProperty($this->formatter, 'url'));
    }

    public function testRenderTitle()
    {
        $title = 'title';
        $description = 'description';
        $return = callMethod(
            $this->formatter,
            'renderTitle',
            [$title, $description]
        );
        $expected = '# ' . $title . "\n" . $description . "\n\n";
        $this->assertEquals($expected, $return);
    }

    public function testGetLinks()
    {
        $links = 'abc';
        setProperty($this->formatter, 'links', $links);
        $return = callMethod($this->formatter, 'getLinks');
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
        $return = callMethod(
            $this->formatter,
            'renderReleases',
            [[$release, $release2]]
        );
        $expected = file_get_contents(__DIR__ . '/expected/render-releases-result.md');
        $this->assertEquals($expected, $return);
    }

    public function testRelease()
    {
        $release = (new Release('tag', '2017-06-07'))
            ->added('1a')
            ->security('b')
            ->fixed('c');
        $return = callMethod($this->formatter, 'renderRelease', [$release]);
        $expected = file_get_contents(__DIR__ . '/expected/render-release-result.md');
        $this->assertEquals($expected, $return);
    }

    public function testRenderChanges()
    {
        $add = new Added();
        $add->add('a');
        $add->add('b');
        $return = callMethod($this->formatter, 'renderChanges', [$add]);
        $expected = file_get_contents(__DIR__ . '/expected/render-changes-result.md');
        $this->assertEquals($expected, $return);
    }

    public function testRenderLink()
    {
        $release = new Release('tag1', '2017-06-07');
        $release2 = new Release('tag2', '2017-05-07');
        $release3 = new Release('tag3', '2017-04-07');
        callMethod($this->formatter, 'renderLink', [$release, $release2]);
        $return = getProperty($this->formatter, 'links');
        $expected = '[tag1]: url/tag2...tag1 ';
        $this->assertEquals($expected, $return, 'Test 2 Tag');
        callMethod($this->formatter, 'renderLink', [$release2, $release3]);
        $return = getProperty($this->formatter, 'links');
        $expected .= '[tag2]: url/tag3...tag2 ';
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

        $result = $this->formatter->render('This is title', 'Very long description...', [
            $release,$release2,$release3
        ]);
        $expected = file_get_contents(__DIR__ . '/expected/render-result.md');
        $this->assertEquals($expected, $result);
    }
}
