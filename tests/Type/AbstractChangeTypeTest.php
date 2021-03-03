<?php declare(strict_types = 1);

namespace Ilex\ChangeLog\Tests\Type;

use Ilex\ChangeLog\Type\AbstractChangeType;
use PHPUnit\Framework\TestCase;

class AbstractChangeTypeTest extends TestCase
{

    /**
     * @var AbstractChangeType
     */
    private AbstractChangeType $changeType;

    protected function setUp():void
    {
        $this->changeType = $this->getMockForAbstractClass(AbstractChangeType::class);
    }

    public function testAdd():void
    {
        $this->changeType->add('a');
        $this->changeType->add('b');

        $return = [];
        try {
            $return = get_property($this->changeType, 'list');
        } catch (\ReflectionException $reflectionException) {
            self::fail($reflectionException->getMessage());
        }
        self::assertEquals(['a', 'b'], $return);
    }

    public function testGetList():void
    {
        $this->changeType->add('a');
        $this->changeType->add('b');
        self::assertEquals(['a', 'b'], $this->changeType->getList());
    }
}
