<?php declare(strict_types = 1);

namespace Ilex\ChangeLog\Tests\Type;

use Ilex\ChangeLog\Type\Security;
use PHPUnit\Framework\TestCase;

class SecurityTest extends TestCase
{
    public function testGetTitle(): void
    {
        $security = new Security();
        self::assertEquals('Security', $security->getTitle());
    }
}
