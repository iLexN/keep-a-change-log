<?php declare(strict_types=1);

namespace Ilex\ChangeLog\Tests;

use Ilex\ChangeLog\Enum\ChangeType;
use Ilex\ChangeLog\Release;
use Ilex\ChangeLog\Type\Added;
use Ilex\ChangeLog\Type\Changed;
use Ilex\ChangeLog\Type\ChangeTypeFactory;
use Ilex\ChangeLog\Type\Deprecated;
use Ilex\ChangeLog\Type\Fixed;
use Ilex\ChangeLog\Type\Removed;
use Ilex\ChangeLog\Type\Security;
use Ilex\ChangeLog\Type\TypeInterface;
use PHPUnit\Framework\TestCase;

class ReleaseTest extends TestCase
{

    /**
     * @var \Ilex\ChangeLog\Release
     */
    private $release;

    /**
     * @var string
     */
    const TAG = '0.0.1';

    /**
     * @var string
     */
    const DATE = '2017-06-07';

    protected function setUp(): void
    {
        $this->release = new Release(self::TAG, self::DATE);
    }

    public function testConstruct(): void
    {
        self::assertEquals(
            self::TAG,
            $this->release->tag,
            'Release tag version test'
        );
        self::assertEquals(
            self::DATE,
            $this->release->date,
            'Release date test'
        );
    }

    public function testConstructWithFactory(): void
    {
        $changeTypeFactory = new ChangeTypeFactory();
        $release = new Release(self::TAG, self::DATE, $changeTypeFactory);
        try {
            self::assertEquals(
                $changeTypeFactory,
                get_property($release, 'changeTypeFactory')
            );
        } catch (\ReflectionException $reflectionException) {
            self::fail($reflectionException->getMessage());
        }
    }

    public function testAddChangeList(): void
    {
        try {
            call_method($this->release, 'addChangeList', [ChangeType::ADDED, 'add1']);
        } catch (\ReflectionException $e) {
            self::fail($e->getMessage());
        }
        try {
            call_method($this->release, 'addChangeList', [ChangeType::ADDED, 'add2']);
        } catch (\ReflectionException $e) {
            self::fail($e->getMessage());
        }

        $expected = ['1' => $this->getExpectedResult()[1]];
        try {
            self::assertEquals(
                $expected,
                get_property($this->release, 'changeList'),
                'Release feature added'
            );
        } catch (\ReflectionException $e) {
            self::fail($e->getMessage());
        }
    }

    public function testAddChangeListReturnSelf(): void
    {
        try {
            self::assertEquals(
                $this->release,
                call_method($this->release, 'addChangeList', [ChangeType::ADDED, 'add2']),
                'Test return self'
            );
        } catch (\ReflectionException $e) {
            self::fail($e->getMessage());
        }
    }


    public function testGetChangeList(): void
    {
        $this->release->added('add1');
        $this->release->added('add2');
        $this->release->changed('change1');
        $this->release->changed('change2');
        $this->release->deprecated('Deprecated1');
        $this->release->deprecated('Deprecated2');
        $this->release->removed('Removed1');
        $this->release->removed('Removed2');
        $this->release->fixed('fixed1');
        $this->release->fixed('fixed2');
        $this->release->security('security1');
        $this->release->security('security2');

        self::assertEquals(
            $this->getExpectedResult(),
            $this->release->getChangeList(),
            'Release get change list'
        );
    }

    public function testAdded(): void
    {
        $this->release->added('add1');
        $this->release->added('add2');

        $expected = ['1' => $this->getExpectedResult()[1]];
        try {
            self::assertEquals(
                $expected,
                get_property($this->release, 'changeList'),
                'Release feature added'
            );
        } catch (\ReflectionException $e) {
            self::fail($e->getMessage());
        }

        try {
            self::assertEquals(
                $this->release,
                call_method($this->release, 'added', [1, 'add2']),
                'Test return self'
            );
        } catch (\ReflectionException $e) {
            self::fail($e->getMessage());
        }
    }

    public function testChanged(): void
    {
        $this->release->changed('change1');
        $this->release->changed('change2');

        $expected = ['2' => $this->getExpectedResult()[2]];
        try {
            self::assertEquals(
                $expected,
                get_property($this->release, 'changeList'),
                'Release feature changed'
            );
        } catch (\ReflectionException $e) {
            self::fail($e->getMessage());
        }

        try {
            self::assertEquals(
                $this->release,
                call_method($this->release, 'changed', [1, 'add2']),
                'Test return self'
            );
        } catch (\ReflectionException $e) {
            self::fail($e->getMessage());
        }
    }

    public function testDeprecated(): void
    {
        $this->release->deprecated('Deprecated1');
        $this->release->deprecated('Deprecated2');

        $expected = ['3' => $this->getExpectedResult()[3]];
        try {
            self::assertEquals(
                $expected,
                get_property($this->release, 'changeList'),
                'Release feature deprecated'
            );
        } catch (\ReflectionException $e) {
            self::fail($e->getMessage());
        }

        try {
            self::assertEquals(
                $this->release,
                call_method($this->release, 'deprecated', [1, 'add2']),
                'Test return self'
            );
        } catch (\ReflectionException $e) {
            self::fail($e->getMessage());
        }
    }

    public function testRemoved(): void
    {
        $this->release->removed('Removed1');
        $this->release->removed('Removed2');

        $expected = [4 => $this->getExpectedResult()[4]];
        try {
            self::assertEquals(
                $expected,
                get_property($this->release, 'changeList'),
                'Release feature removed'
            );
        } catch (\ReflectionException) {
        }

        try {
            self::assertEquals(
                $this->release,
                call_method($this->release, 'removed', [1, 'add2']),
                'Test return self'
            );
        } catch (\ReflectionException $e) {
            self::fail($e->getMessage());
        }
    }

    public function testFixed(): void
    {
        $this->release->fixed('fixed1');
        $this->release->fixed('fixed2');

        $expected = [5 => $this->getExpectedResult()[5]];
        try {
            self::assertEquals(
                $expected,
                get_property($this->release, 'changeList'),
                'Release feature fixed'
            );
        } catch (\ReflectionException $e) {
            self::fail($e->getMessage());
        }
    }

    public function testSecurity(): void
    {
        $this->release->security('security1');
        $this->release->security('security2');

        $expected = [6 => $this->getExpectedResult()[6]];
        try {
            self::assertEquals(
                $expected,
                get_property($this->release, 'changeList'),
                'Release feature fixed'
            );
        } catch (\ReflectionException $e) {
            self::fail($e->getMessage());
        }
        try {
            self::assertEquals(
                $this->release,
                call_method($this->release, 'security', [1, 'add2']),
                'Test return self'
            );
        } catch (\ReflectionException $e) {
            self::fail($e->getMessage());
        }
    }

    /**
     * @return array<int,TypeInterface>
     */
    private function getExpectedResult(): array
    {
        $added = new Added();
        $added->add('add1');
        $added->add('add2');

        $changed = new Changed();
        $changed->add('change1');

        $changed->add('change2');
        $deprecated = new Deprecated();

        $deprecated->add('Deprecated1');
        $deprecated->add('Deprecated2');

        $removed = new Removed();
        $removed->add('Removed1');

        $removed->add('Removed2');
        $fixed = new Fixed();
        $fixed->add('fixed1');
        $fixed->add('fixed2');
        $security = new Security();
        $security->add('security1');
        $security->add('security2');

        return [
            1 => $added,
            2 => $changed,
            3 => $deprecated,
            4 => $removed,
            5 => $fixed,
            6 => $security,
        ];
    }
}
