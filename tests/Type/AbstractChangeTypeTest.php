<?php
declare(strict_types=1);

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
        $this->assertEquals(['a','b'], getProperty($this->type, 'list'));
    }

    public function testGetList()
    {
        $this->type->add('a');
        $this->type->add('b');
        $this->assertEquals(['a','b'], $this->type->getList());
    }
}
