<?php

namespace App\Command;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\HttpKernel\CacheClearer\CacheClearerInterface;

#[AsCommand(name: 'app:clear-cache', description: 'Clear Symfony cache')]
class ClearCacheCommand extends Command
{
    private CacheClearerInterface $cacheClearer;

    public function __construct(CacheClearerInterface $cacheClearer)
    {
        $this->cacheClearer = $cacheClearer;
        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $this->cacheClearer->clear('');
        $output->writeln('Cache cleared successfully.');
        return Command::SUCCESS;
    }
}