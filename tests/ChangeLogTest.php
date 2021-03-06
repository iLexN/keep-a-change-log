<?php declare(strict_types = 1);

namespace Ilex\ChangeLog\Tests;

use Ilex\ChangeLog\ChangeLog;
use Ilex\ChangeLog\Formatter\DefaultFormatter;
use Ilex\ChangeLog\Formatter\FormatterInterface;
use Ilex\ChangeLog\Release;
use PHPUnit\Framework\TestCase;
use ReflectionException;

class ChangeLogTest extends TestCase
{

    /**
     * @var \Ilex\ChangeLog\ChangeLog
     */
    private $changeLog;

    protected function setup(): void
    {
        $title = 'Title';
        $description = 'This is description';
        $defaultFormatter = new DefaultFormatter('url');
        $this->changeLog = new ChangeLog($title, $description, $defaultFormatter);
    }

    public function testConstruct(): void
    {
        $title = 'Title';
        $description = 'This is description';
        $defaultFormatter = new DefaultFormatter('url');

        try {
            self::assertEquals(
                $title,
                get_property($this->changeLog, 'title'),
                'Test title'
            );
        } catch (\ReflectionException $reflectionException) {
            self::fail($reflectionException->getMessage());
        }
        try {
            self::assertEquals(
                $description,
                get_property($this->changeLog, 'description'),
                'Test description'
            );
        } catch (ReflectionException $e) {
            self::fail($e->getMessage());
        }
        try {
            self::assertEquals(
                $defaultFormatter,
                get_property($this->changeLog, 'formatter'),
                'Test formatter'
            );
        } catch (ReflectionException $e) {
            self::fail($e->getMessage());
        }
    }

    public function testAddReleaseData(): void
    {
        $r1 = new Release('tag', '2017-01-01');
        $r2 = new Release('tag', '2017-01-02');
        $r3 = new Release('tag', '2017-01-03');

        $this->changeLog
            ->addRelease($r1)
            ->addRelease($r2)
            ->addRelease($r3);

        try {
            self::assertEquals(
                [$r1, $r2, $r3],
                get_property($this->changeLog, 'releases')
            );
        } catch (\ReflectionException $e) {
            self::fail($e->getMessage());
        }
    }

    public function testAddReleaseReturnSelf(): void
    {
        $release = new Release('tag', '2017-01-01');

        self::assertEquals(
            $this->changeLog,
            $this->changeLog->addRelease($release)
        );
    }

    public function testAddReleaseReturnSelfWithMock(): void
    {
        /** @var \Ilex\ChangeLog\Release $mockRelease */
        $mockRelease = $this->createMock(Release::class);
        self::assertEquals(
            $this->changeLog,
            $this->changeLog->addRelease($mockRelease)
        );
    }

    public function testRender(): void
    {
        $this->changeLog->addRelease(
            (new Release('0.0.4', '2018-01-22'))
                ->fixed('Change Log link format')
        )->addRelease(
            (new Release('0.0.3', '2018-01-20'))
                ->added('Add Docs')
                ->added('phpunit test')
                ->added('example')
                ->fixed('Fix the title of removed & security')
                ->fixed('Duplicate Render Release link')
                ->changed('composer package sort by order')
        )->addRelease(
            (new Release('0.0.2', '2018-01-18'))
                ->added('Add Docs')
                ->added('phpunit test')
                ->changed('Folder structure')
        )->addRelease(
            (new Release('0.0.1', '2018-01-17'))
                ->added('First release')
        );

        $result = $this->changeLog->render();
        $expected = \file_get_contents(__DIR__.'/expected/change-log.md');
        self::assertEquals($expected, $result, 'Test ChangeLog Full Render');
    }

    public function testRender3(): void
    {
        $mock = $this->createMock(FormatterInterface::class);
        $mock->expects(self::once())
            ->method('render')
            ->willReturn('abc');
        $changelog = new ChangeLog('a', 'b', $mock);
        self::assertEquals('abc', $changelog->render());
    }
}
