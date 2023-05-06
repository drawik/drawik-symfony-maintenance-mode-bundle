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
    name: 'maintenance:disable',
    description: 'Disables maintenance mode.',
)]
class ModeDisable extends Command
{
    public function __construct(private readonly string $filePath)
    {
        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        if (file_exists($this->filePath)) {
            unlink($this->filePath);
        }
        $output->writeln('<info>Maintenance mode disabled.</info>');

        return 0;
    }
}
