<?php

namespace peb\velibBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class updateCommand
 * @package peb\velibBundle\Command
 */
class updateCommand extends ContainerAwareCommand{

    protected function configure()
    {
        $this
            ->setName('peb:velib:update')
            ->setDescription('Get information about velib station');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->getContainer()->get('pebvelib.update')->run();
        $output->writeln('update end');
    }
} 