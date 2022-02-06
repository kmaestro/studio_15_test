<?php

namespace App\Command;

use App\Sitemap\Service\SitemapGeneratorService;
use App\Sitemap\Service\UrlGeneratorService;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(
    name: 'sitemap:generator',
    description: 'Add a short description for your command',
)]
class SitemapGeneratorCommand extends Command
{
    private SitemapGeneratorService $sitemapGeneratorService;
    private UrlGeneratorService $urlGeneratorService;

    public function __construct(
        SitemapGeneratorService $sitemapGeneratorService,
        UrlGeneratorService     $urlGeneratorService,
        string                  $name = null
    )
    {
        parent::__construct($name);
        $this->sitemapGeneratorService = $sitemapGeneratorService;
        $this->urlGeneratorService = $urlGeneratorService;
    }

    protected function configure(): void
    {
        $this
            ->addArgument('arg1', InputArgument::OPTIONAL, 'Argument description')
            ->addOption('option1', null, InputOption::VALUE_NONE, 'Option description');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $this->sitemapGeneratorService->execute($this->urlGeneratorService->execute());
        return Command::SUCCESS;
    }
}
