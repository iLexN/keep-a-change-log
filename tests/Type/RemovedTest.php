<?php
declare(strict_types=1);

namespace Ilex\ChangeLog\Tests\Type;

use Ilex\ChangeLog\Type\Removed;
use PHPUnit\Framework\TestCase;

class RemovedTest extends TestCase
{
    public function testGetTitle()
    {
        $class = new Removed();
        $this->assertSame('Removed', $class->getTitle());
    }
}
