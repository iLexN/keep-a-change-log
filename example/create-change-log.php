<?php

use Ilex\ChangeLog\ChangeLog;
use Ilex\ChangeLog\Formatter\DefaultFormatter;
use Ilex\ChangeLog\Release;

require(__DIR__ . '/../vendor/autoload.php');

$c = new ChangeLog(
    'Change Log',
    'All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/)
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).',
    new DefaultFormatter('https://github.com/iLexN/keep-a-change-log/compare')
);

$c->addRelease(
    (new Release('2.0.1', '2021-12-07'))
        ->fixed('Missing symfony console')
);

$c->addRelease(
    (new Release('2.0.0', '2021-11-26'))
        ->added('Add support for PHP 8.1')
        ->changed('ChangeTypeFactoryInterface - changed the int input to enum input')
        ->removed('Remove support for PHP 8.0')
);

$c->addRelease(
    (new Release('1.3.1', '2021-08-10'))
        ->fixed('fix composer.json bin command')
);

$c->addRelease(
    (new Release('1.3.0', '2021-07-14'))
        ->added('Add bin command')
);

$c->addRelease(
    (new Release('1.2.0', '2021-03-04'))
        ->added('Add github CI')
        ->added('PHP 8 support')
        ->removed('Remove PHP 7.* support')
        ->removed('Remove Travis CI')
);

$c->addRelease(
    (new Release('1.1.0', '2018-02-03'))
        ->added('Add `Type` factory Interface for easy extend')
        ->removed('Remove PHP 7.0 support')
)->addRelease(
    (new Release('1.0.0', '2018-01-22'))
        ->added('Add test for 100% code coverage')
        ->added('Add CI config for travis-ci, coveralls.io and scrutinizer-ci')
)->addRelease(
    (new Release('0.0.3', '2018-01-20'))
        ->added('Add Docs')
        ->added('phpunit test')
        ->added('example')
        ->fixed('Fix the title of removed & security')
        ->fixed('Duplicate Render Release link')
        ->changed('composer package sort by order')
)->addRelease(
    (new Release('0.0.2', '2018-01-18'))
        ->added('Add Docs')
        ->added('phpunit test')
        ->changed('Folder structure')
)->addRelease(
    (new Release('0.0.1', '2018-01-17'))
        ->added('First release')
);

return $c;
