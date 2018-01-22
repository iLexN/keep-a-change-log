<?php

namespace Ilex\ChangeLog\Tests;

use Ilex\ChangeLog\ChangeLog;
use Ilex\ChangeLog\Formatter\DefaultFormatter;
use Ilex\ChangeLog\Release;
use PHPUnit\Framework\TestCase;

class ChangeLogTest extends TestCase
{

    /**
     * @var ChangeLog
     */
    private $changeLog;

    protected function setup()
    {
        $title = 'Title';
        $description = 'This is description';
        $formatter = new DefaultFormatter('url');
        $this->changeLog = new ChangeLog($title, $description, $formatter);
    }

    public function testConstruct()
    {
        $title = 'Title';
        $description = 'This is description';
        $formatter = new DefaultFormatter('url');

        try {
            $this->assertSame(
                $title,
                getProperty($this->changeLog, 'title'),
                'Test title'
            );
        } catch (\ReflectionException $e) {
            $this->fail($e->getMessage());
        }
        try {
            $this->assertSame(
                $description,
                getProperty($this->changeLog, 'description'),
                'Test description'
            );
        } catch (\ReflectionException $e) {
            $this->fail($e->getMessage());
        }
        try {
            $this->assertSame(
                $formatter,
                getProperty($this->changeLog, 'formatter'),
                'Test formatter'
            );
        } catch (\ReflectionException $e) {
            $this->fail($e->getMessage());
        }
    }

    public function testAddReleaseData()
    {
        $r1 = new Release('tag', '2017-01-01');
        $r2 = new Release('tag', '2017-01-02');
        $r3 = new Release('tag', '2017-01-03');

        $this->changeLog
            ->addRelease($r1)
            ->addRelease($r2)
            ->addRelease($r3);

        try {
            $this->assertSame(
                [$r1, $r2, $r3],
                getProperty($this->changeLog, 'releases')
            );
        } catch (\ReflectionException $e) {
            $this->fail($e->getMessage());
        }
    }

    public function testAddReleaseReturnSelf()
    {
        $r1 = new Release('tag', '2017-01-01');

        $this->assertSame(
            $this->changeLog,
            $this->changeLog->addRelease($r1)
        );
    }

    public function testRender()
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
        $expected = file_get_contents(__DIR__ . '/expected/change-log.md');
        $this->assertSame($expected, $result, 'Test ChangeLog Full Render');
    }
}
