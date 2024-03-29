<?php declare(strict_types = 1);

namespace Ilex\ChangeLog;

use Ilex\ChangeLog\Enum\ChangeType;
use Ilex\ChangeLog\Type\ChangeTypeFactory;
use Ilex\ChangeLog\Type\ChangeTypeFactoryInterface;

/**
 * Class Release
 *
 * @package Ilex\ChangeLog
 */
class Release
{

    /**
     * @var \Ilex\ChangeLog\Type\TypeInterface[]
     */
    private array $changeList = [];

    private readonly ChangeTypeFactoryInterface $changeTypeFactory;

    /**
     * Release constructor.
     */
    public function __construct(
        public readonly string $tag,
        public readonly string $date,
        ?ChangeTypeFactoryInterface $changeTypeFactory = null
    ) {
        $this->changeTypeFactory = $this->setFactory($changeTypeFactory);
    }

    private function setFactory(?ChangeTypeFactoryInterface $changeTypeFactory): ChangeTypeFactoryInterface
    {
        return $changeTypeFactory ?? new ChangeTypeFactory();
    }


    private function addChangeList(ChangeType $changeType, string $description): self
    {
        $key = $changeType->value;
        if (!\array_key_exists($key, $this->changeList)) {
            $this->changeList[$key] = $this->changeTypeFactory->create($changeType);
        }

        $this->changeList[$key]->add($description);
        return $this;
    }

    /**
     * @return \Ilex\ChangeLog\Type\TypeInterface[]
     */
    public function getChangeList(): array
    {
        return $this->changeList;
    }

    public function added(string $description): self
    {
        return $this->addChangeList(ChangeType::ADDED, $description);
    }

    public function changed(string $description): self
    {
        return $this->addChangeList(ChangeType::CHANGED, $description);
    }

    public function deprecated(string $description): self
    {
        return $this->addChangeList(
            ChangeType::DEPRECATED,
            $description
        );
    }

    public function removed(string $description): self
    {
        return $this->addChangeList(ChangeType::REMOVED, $description);
    }

    public function fixed(string $description): self
    {
        return $this->addChangeList(ChangeType::FIXED, $description);
    }

    public function security(string $description): self
    {
        return $this->addChangeList(ChangeType::SECURITY, $description);
    }
}
