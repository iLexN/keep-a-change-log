<?php
declare(strict_types=1);

namespace Ilex\ChangeLog\Tests\Type;

use Ilex\ChangeLog\Type\Added;
use PHPUnit\Framework\TestCase;

class AddedTest extends TestCase
{
    public function testGetTitle()
    {
        $class = new Added();
        $this->assertSame('Added', $class->getTitle());
    }
}
