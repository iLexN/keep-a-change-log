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
        $changeTypeFactory = new ChangeTypeFactory();

        self::assertEquals(new Added(), $changeTypeFactory->create(1));
        self::assertEquals(
            new Added(),
            $changeTypeFactory->create(ChangeTypeFactory::ADDED)
        );

        self::assertEquals(new Changed(), $changeTypeFactory->create(2));
        self::assertEquals(
            new Changed(),
            $changeTypeFactory->create(ChangeTypeFactory::CHANGED)
        );

        self::assertEquals(new Deprecated(), $changeTypeFactory->create(3));
        self::assertEquals(
            new Deprecated(),
            $changeTypeFactory->create(ChangeTypeFactory::DEPRECATED)
        );

        self::assertEquals(new Removed(), $changeTypeFactory->create(4));
        self::assertEquals(
            new Removed(),
            $changeTypeFactory->create(ChangeTypeFactory::REMOVED)
        );

        self::assertEquals(new Fixed(), $changeTypeFactory->create(5));
        self::assertEquals(
            new Fixed(),
            $changeTypeFactory->create(ChangeTypeFactory::FIXED)
        );

        self::assertEquals(new SECURITY(), $changeTypeFactory->create(6));
        self::assertEquals(
            new SECURITY(),
            $changeTypeFactory->create(ChangeTypeFactory::SECURITY)
        );

        self::assertEquals(new Added(), $changeTypeFactory->create(11111));
    }
}
