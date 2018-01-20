<?php

use Ilex\ChangeLog\ChangeLog;
use Ilex\ChangeLog\Formatter\DefaultFormatter;
use Ilex\ChangeLog\Release;

require(__DIR__ . '/../vendor/autoload.php');

$c = new ChangeLog(
    'Change Log',
    'All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](http://keepachangelog.com/en/1.0.0/)
and this project adheres to [Semantic Versioning](http://semver.org/spec/v2.0.0.html).',
    new DefaultFormatter('https://github.com/iLexN/keep-a-change-log/compare')
);

$c->addRelease(
    (new Release('HEAD', ''))
        ->fixed('Change Log link format')
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


print($c->rand());
// or save
file_put_contents(__DIR__ . '/../CHANGELOG.md', $c->rand());
