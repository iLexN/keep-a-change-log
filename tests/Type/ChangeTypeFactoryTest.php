<?php
declare(strict_types=1);

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
    public function testFactory()
    {
        $this->assertEquals(new Added(), ChangeTypeFactory::factory(1));
        $this->assertEquals(new Added(), ChangeTypeFactory::factory(ChangeTypeFactory::ADDED));

        $this->assertEquals(new Changed(), ChangeTypeFactory::factory(2));
        $this->assertEquals(new Changed(), ChangeTypeFactory::factory(ChangeTypeFactory::CHANGED));

        $this->assertEquals(new Deprecated(), ChangeTypeFactory::factory(3));
        $this->assertEquals(new Deprecated(), ChangeTypeFactory::factory(ChangeTypeFactory::DEPRECATED));

        $this->assertEquals(new Removed(), ChangeTypeFactory::factory(4));
        $this->assertEquals(new Removed(), ChangeTypeFactory::factory(ChangeTypeFactory::REMOVED));

        $this->assertEquals(new Fixed(), ChangeTypeFactory::factory(5));
        $this->assertEquals(new Fixed(), ChangeTypeFactory::factory(ChangeTypeFactory::FIXED));

        $this->assertEquals(new SECURITY(), ChangeTypeFactory::factory(6));
        $this->assertEquals(new SECURITY(), ChangeTypeFactory::factory(ChangeTypeFactory::SECURITY));

        $this->assertEquals(new Added(), ChangeTypeFactory::factory(11111));

        //$this->expectException(\TypeError::class);
        //ChangeTypeFactory::factory('a');
    }
}
