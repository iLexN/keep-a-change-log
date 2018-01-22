<?php
declare(strict_types=1);

namespace Ilex\ChangeLog\Tests\Type;

use Ilex\ChangeLog\Type\Changed;
use PHPUnit\Framework\TestCase;

class ChangedTest extends TestCase
{
    public function testGetTitle()
    {
        $class = new Changed();
        $this->assertEquals('Changed', $class->getTitle());
    }
}
