<?php
/**
 * Copyright © Fast White Cat S.A. All rights reserved.
 * See LICENSE_FASTWHITECAT for license details.
 */

declare(strict_types=1);

namespace Drawik\MaintenanceModeBundle\Command;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(
    name: 'maintenance:enable',
    description: 'Enables maintenance mode.',
)]
class ModeEnable extends Command
{
    public function __construct(private readonly string $filePath)
    {
        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        file_put_contents($this->filePath, "");

        $output->writeln('<info>Maintenance mode enabled.</info>');

        return 0;
    }
}
