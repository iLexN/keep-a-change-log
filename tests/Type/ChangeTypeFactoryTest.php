<?php declare(strict_types = 1);

namespace Ilex\ChangeLog\Tests\Type;

use Ilex\ChangeLog\Enum\ChangeType;
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
        $changeTypeFactory = new ChangeTypeFactory();

        //self::assertEquals(new Added(), $changeTypeFactory->create(ChangeType::ADDED));
        self::assertEquals(
            new Added(),
            $changeTypeFactory->create(ChangeType::ADDED)
        );

        //self::assertEquals(new Changed(), $changeTypeFactory->create(ChangeType::CHANGED));
        self::assertEquals(
            new Changed(),
            $changeTypeFactory->create(ChangeType::CHANGED)
        );

        //self::assertEquals(new Deprecated(), $changeTypeFactory->create(ChangeType::DEPRECATED));
        self::assertEquals(
            new Deprecated(),
            $changeTypeFactory->create(ChangeType::DEPRECATED)
        );

        //self::assertEquals(new Removed(), $changeTypeFactory->create(ChangeType::REMOVED));
        self::assertEquals(
            new Removed(),
            $changeTypeFactory->create(ChangeType::REMOVED)
        );

        //self::assertEquals(new Fixed(), $changeTypeFactory->create(ChangeType::FIXED));
        self::assertEquals(
            new Fixed(),
            $changeTypeFactory->create(ChangeType::FIXED)
        );

        //self::assertEquals(new SECURITY(), $changeTypeFactory->create(ChangeType::SECURITY));
        self::assertEquals(
            new SECURITY(),
            $changeTypeFactory->create(ChangeType::SECURITY)
        );

//        self::assertEquals(new Added(), $changeTypeFactory->create(11111));
    }
}
