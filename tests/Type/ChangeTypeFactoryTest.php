<?php declare(strict_types = 1);

namespace Ilex\ChangeLog\Tests\Type;

use Ilex\ChangeLog\Type\Added;
use Ilex\ChangeLog\Type\Changed;
use Ilex\ChangeLog\Type\ChangeTypeFactory;
use Ilex\ChangeLog\Type\Deprecated;
use Ilex\ChangeLog\Type\Fixed;
use Ilex\ChangeLog\Type\Removed;
use Ilex\ChangeLog\Type\Security;
use PHPUnit\Framework\TestCase;

class ChangeTypeFactoryTest extends TestCase
{
    public function testFactory(): void
    {
        $factory = new ChangeTypeFactory();

        $this->assertEquals(new Added(), $factory->create(1));
        $this->assertEquals(
            new Added(),
            $factory->create(ChangeTypeFactory::ADDED)
        );

        $this->assertEquals(new Changed(), $factory->create(2));
        $this->assertEquals(
            new Changed(),
            $factory->create(ChangeTypeFactory::CHANGED)
        );

        $this->assertEquals(new Deprecated(), $factory->create(3));
        $this->assertEquals(
            new Deprecated(),
            $factory->create(ChangeTypeFactory::DEPRECATED)
        );

        $this->assertEquals(new Removed(), $factory->create(4));
        $this->assertEquals(
            new Removed(),
            $factory->create(ChangeTypeFactory::REMOVED)
        );

        $this->assertEquals(new Fixed(), $factory->create(5));
        $this->assertEquals(
            new Fixed(),
            $factory->create(ChangeTypeFactory::FIXED)
        );

        $this->assertEquals(new SECURITY(), $factory->create(6));
        $this->assertEquals(
            new SECURITY(),
            $factory->create(ChangeTypeFactory::SECURITY)
        );

        $this->assertEquals(new Added(), $factory->create(11111));
    }
}
