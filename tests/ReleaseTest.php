<?php
declare(strict_types=1);

namespace Ilex\ChangeLog\Tests;

use Ilex\ChangeLog\Release;
use Ilex\ChangeLog\Type\Added;
use Ilex\ChangeLog\Type\Changed;
use Ilex\ChangeLog\Type\Deprecated;
use Ilex\ChangeLog\Type\Fixed;
use Ilex\ChangeLog\Type\Removed;
use Ilex\ChangeLog\Type\Security;
use PHPUnit\Framework\TestCase;

class ReleaseTest extends TestCase
{

    /**
     * @var Release
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

    protected function setUp()
    {
        $this->release = new Release(self::TAG, self::DATE);
    }

    public function testConstruct()
    {
        $this->assertEquals(
            self::TAG,
            $this->release->tag,
            'Release tag version test'
        );
        $this->assertEquals(
            self::DATE,
            $this->release->date,
            'Release date test'
        );
    }


    public function testGetChangeList()
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

        $this->assertEquals(
            $this->getExpectedResult(),
            $this->release->getChangeList(),
            'Release get change list'
        );
    }

    public function testAdded()
    {
        $this->release->added('add1');
        $this->release->added('add2');

        $expected = ['1' => $this->getExpectedResult()[1]];
        $this->assertEquals(
            $expected,
            $this->release->getChangeList(),
            'Release feature added'
        );
    }

    public function testChanged()
    {
        $this->release->changed('change1');
        $this->release->changed('change2');

        $expected = ['2' => $this->getExpectedResult()[2]];
        $this->assertEquals(
            $expected,
            $this->release->getChangeList(),
            'Release feature changed'
        );
    }

    public function testDeprecated()
    {
        $this->release->deprecated('Deprecated1');
        $this->release->deprecated('Deprecated2');

        $expected = ['3' => $this->getExpectedResult()[3]];
        $this->assertEquals(
            $expected,
            $this->release->getChangeList(),
            'Release feature deprecated'
        );
    }

    public function testRemoved()
    {
        $this->release->removed('Removed1');
        $this->release->removed('Removed2');

        $expected = [4 => $this->getExpectedResult()[4]];
        $this->assertEquals(
            $expected,
            $this->release->getChangeList(),
            'Release feature removed'
        );
    }

    public function testFixed()
    {
        $this->release->fixed('fixed1');
        $this->release->fixed('fixed2');

        $expected = [5 => $this->getExpectedResult()[5]];
        $this->assertEquals(
            $expected,
            $this->release->getChangeList(),
            'Release feature fixed'
        );
    }

    public function testSecurity()
    {
        $this->release->security('security1');
        $this->release->security('security2');

        $expected = [6 => $this->getExpectedResult()[6]];
        $this->assertEquals(
            $expected,
            $this->release->getChangeList(),
            'Release feature fixed'
        );
    }

    private function getExpectedResult()
    {
        $added = new Added();
        $added->add('add1');
        $added->add('add2');
        $change = new Changed();
        $change->add('change1');
        $change->add('change2');
        $deprecated = new Deprecated();
        $deprecated->add('Deprecated1');
        $deprecated->add('Deprecated2');
        $remove = new Removed();
        $remove->add('Removed1');
        $remove->add('Removed2');
        $fixed = new Fixed();
        $fixed->add('fixed1');
        $fixed->add('fixed2');
        $security = new Security();
        $security->add('security1');
        $security->add('security2');

        return [
            1 => $added,
            2 => $change,
            3 => $deprecated,
            4 => $remove,
            5 => $fixed,
            6 => $security,
        ];
    }
}
