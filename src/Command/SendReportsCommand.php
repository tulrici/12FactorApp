<?php

namespace App\Command;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(name: 'app:send-reports', description: 'Send statistical reports')]
class SendReportsCommand extends Command
{
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        // Logic to generate and send a report
        $output->writeln('Statistics report sent successfully.');
        return Command::SUCCESS;
    }
}