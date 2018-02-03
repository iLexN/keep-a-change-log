<?php declare(strict_types = 1);

namespace Ilex\ChangeLog\Tests\Type;

use Ilex\ChangeLog\Type\AbstractChangeType;
use PHPUnit\Framework\TestCase;

class AbstractChangeTypeTest extends TestCase
{

    /**
     * @var AbstractChangeType
     */
    private $type;

    protected function setUp()
    {
        $this->type = $this->getMockForAbstractClass(AbstractChangeType::class);
    }

    public function testAdd()
    {
        $this->type->add('a');
        $this->type->add('b');
        $return = '';
        try {
            $return = getProperty($this->type, 'list');
        } catch (\ReflectionException $e) {
            $this->fail($e->getMessage());
        }
        $this->assertEquals(['a', 'b'], $return);
    }

    public function testGetList()
    {
        $this->type->add('a');
        $this->type->add('b');
        $this->assertEquals(['a', 'b'], $this->type->getList());
    }
}
