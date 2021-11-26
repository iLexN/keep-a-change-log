<?php declare(strict_types = 1);

namespace Ilex\ChangeLog;

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

    /**
     * @var \Ilex\ChangeLog\Type\ChangeTypeFactoryInterface
     */
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


    private function addChangeList(int $key, string $description): self
    {
        if (!\array_key_exists($key, $this->changeList)) {
            $this->changeList[$key] = $this->changeTypeFactory->create($key);
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
        return $this->addChangeList(ChangeTypeFactory::ADDED, $description);
    }

    public function changed(string $description): self
    {
        return $this->addChangeList(ChangeTypeFactory::CHANGED, $description);
    }

    public function deprecated(string $description): self
    {
        return $this->addChangeList(
            ChangeTypeFactory::DEPRECATED,
            $description
        );
    }

    public function removed(string $description): self
    {
        return $this->addChangeList(ChangeTypeFactory::REMOVED, $description);
    }

    public function fixed(string $description): self
    {
        return $this->addChangeList(ChangeTypeFactory::FIXED, $description);
    }

    public function security(string $description): self
    {
        return $this->addChangeList(ChangeTypeFactory::SECURITY, $description);
    }
}
