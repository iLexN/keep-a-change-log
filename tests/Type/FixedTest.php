<?php declare(strict_types = 1);

namespace Ilex\ChangeLog\Tests\Type;

use Ilex\ChangeLog\Type\Fixed;
use PHPUnit\Framework\TestCase;

class FixedTest extends TestCase
{
    public function testGetTitle(): void
    {
        $fixed = new Fixed();
        self::assertEquals('Fixed', $fixed->getTitle());
    }
}
