<?php

namespace App\Command;

use Doctrine\Migrations\DependencyFactory;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(name: 'app:run-migrations', description: 'Run database migrations')]
class RunMigrationsCommand extends Command
{
    private DependencyFactory $migrationFactory;

    public function __construct(DependencyFactory $migrationFactory)
    {
        $this->migrationFactory = $migrationFactory;
        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $this->migrationFactory->getMigrator()->migrate();
        $output->writeln('Migrations have been successfully executed.');
        return Command::SUCCESS;
    }
}