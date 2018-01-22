<?php
declare(strict_types = 1);

namespace Ilex\ChangeLog;

use Ilex\ChangeLog\Type\ChangeTypeFactory;
use Ilex\ChangeLog\Type\TypeInterface;

/**
 * Class Release
 *
 * @package Ilex\ChangeLog
 */
class Release
{

    /**
     * @var string
     */
    public $tag;

    /**
     * @var string
     */
    public $date;

    /**
     * @var TypeInterface[]
     */
    private $changeList = [];

    /**
     * Release constructor.
     *
     * @param string $tag
     * @param string $date
     */
    public function __construct(string $tag, string $date)
    {
        $this->tag = $tag;
        $this->date = $date;
    }


    /**
     * @param int $key
     * @param string $description
     *
     * @return Release
     */
    private function addChangeList(int $key, string $description): self
    {
        if (!\array_key_exists($key, $this->changeList)) {
            $this->changeList[$key] = ChangeTypeFactory::factory($key);
        }
        $this->changeList[$key]->add($description);
        return $this;
    }

    /**
     * @return array
     */
    public function getChangeList(): array
    {
        return $this->changeList;
    }

    /**
     * @param string $description
     *
     * @return Release
     */
    public function added(string $description): self
    {
        return $this->addChangeList(ChangeTypeFactory::ADDED, $description);
    }

    /**
     * @param string $description
     *
     * @return Release
     */
    public function changed(string $description): self
    {
        return $this->addChangeList(ChangeTypeFactory::CHANGED, $description);
    }

    /**
     * @param string $description
     *
     * @return Release
     */
    public function deprecated(string $description): self
    {
        return $this->addChangeList(
            ChangeTypeFactory::DEPRECATED,
            $description
        );
    }

    /**
     * @param string $description
     *
     * @return Release
     */
    public function removed(string $description): self
    {
        return $this->addChangeList(ChangeTypeFactory::REMOVED, $description);
    }

    /**
     * @param string $description
     *
     * @return Release
     */
    public function fixed(string $description): self
    {
        return $this->addChangeList(ChangeTypeFactory::FIXED, $description);
    }

    /**
     * @param string $description
     *
     * @return Release
     */
    public function security(string $description): self
    {
        return $this->addChangeList(ChangeTypeFactory::SECURITY, $description);
    }
}
