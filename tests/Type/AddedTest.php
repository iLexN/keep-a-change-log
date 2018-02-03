<?php declare(strict_types = 1);

namespace Ilex\ChangeLog\Tests\Type;

use Ilex\ChangeLog\Type\Added;
use PHPUnit\Framework\TestCase;

class AddedTest extends TestCase
{
    public function testGetTitle(): void
    {
        $class = new Added();
        $this->assertEquals('Added', $class->getTitle());
    }
}
