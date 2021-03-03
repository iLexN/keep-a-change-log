<?php declare(strict_types = 1);

namespace Ilex\ChangeLog\Tests\Type;

use Ilex\ChangeLog\Type\Removed;
use PHPUnit\Framework\TestCase;

class RemovedTest extends TestCase
{
    public function testGetTitle(): void
    {
        $removed = new Removed();
        self::assertEquals('Removed', $removed->getTitle());
    }
}
