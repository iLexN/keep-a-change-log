#!/usr/bin/env php
<?php
declare(strict_types=1);

use Ilex\ChangeLog\ChangeLog;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\SingleCommandApplication;
use Symfony\Component\Console\Style\SymfonyStyle;

$possibleAutoloadPaths = [
    // local dev repository
    __DIR__ . '/../vendor/autoload.php',
    // dependency
    __DIR__ . '/../../../../vendor/autoload.php',
];

$isAutoloadFound = false;
foreach ($possibleAutoloadPaths as $possibleAutoloadPath) {
    if (file_exists($possibleAutoloadPath)) {
        require_once $possibleAutoloadPath;
        $isAutoloadFound = true;
        break;
    }
}

if ($isAutoloadFound === false) {
    throw new RuntimeException(sprintf(
        'Unable to find "vendor/autoload.php" in "%s" paths.',
        implode('", "', $possibleAutoloadPaths)
    ));
}

(new SingleCommandApplication())
    ->setName('Keep a change log') // Optional
    ->addArgument('path', InputArgument::REQUIRED, 'Config path')
    ->addArgument('destination', InputArgument::OPTIONAL,
        'CHANGELOG.md destination', '.')
    ->setCode(static function (
        InputInterface $input,
        OutputInterface $output
    ): int {
        $io = new SymfonyStyle($input, $output);

        /** @var string $path */
        $path = $input->getArgument('path');
        /** @var string $target */
        $target = $input->getArgument('destination');
        $file = $target . '/CHANGELOG.md';

        $io->section('Reading config file');
        $io->info('Config file path: ' . $path);
        if (!file_exists($path)) {
            $io->error('file not exist');
            return Command::FAILURE;
        }
        $io->info('Changelog file path: ' . $file);

        /** @var ChangeLog $changeLog */
        $changeLog = include $path;
        $result = \file_put_contents($file, $changeLog->render());
        if ($result === false) {
            $io->error('Cannot write file');
        } else {
            $io->info('Success');
        }

        return Command::SUCCESS;
    })
    ->run();
