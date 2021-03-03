<?php declare(strict_types = 1);

namespace Ilex\ChangeLog\Tests\Type;

use Ilex\ChangeLog\Type\Deprecated;
use PHPUnit\Framework\TestCase;

class DeprecatedTest extends TestCase
{
    public function testGetTitle(): void
    {
        $deprecated = new Deprecated();
        self::assertEquals('Deprecated', $deprecated->getTitle());
    }
}
