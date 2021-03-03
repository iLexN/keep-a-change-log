<?php

declare(strict_types=1);

use Rector\Core\Configuration\Option;
use Rector\Set\ValueObject\SetList;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;

return static function (ContainerConfigurator $containerConfigurator): void {
    $parameters = $containerConfigurator->parameters();

    $parameters->set(Option::SETS, [
        SetList::CODE_QUALITY,
        SetList::DEAD_CODE,
        SetList::CODING_STYLE,
        SetList::PHP_71,
        SetList::PHP_72,
        SetList::PHP_73,
        SetList::PHP_74,
        SetList::PHP_80,
        SetList::PSR_4,
        SetList::CODE_QUALITY_STRICT,
        SetList::EARLY_RETURN,
        SetList::NAMING,
        SetList::PHPUNIT_70,
        SetList::PHPUNIT_80,
        SetList::PHPUNIT_90,
        SetList::PHPUNIT_91,
    ]);

    $parameters->set(Option::SKIP, []);

};
