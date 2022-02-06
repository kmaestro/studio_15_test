<?php

namespace App\Sitemap\Service;

use App\Repository\NewsRepository;
use App\Sitemap\Generator\UrlGeneratorRegistry;
use App\Sitemap\SitemapDto;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class UrlGeneratorService
{
    public function __construct(
        private UrlGeneratorRegistry $generatorRegistry
    )
    {
    }

    public function execute(): array
    {
        $array = [];

        foreach ($this->generatorRegistry->getGenerators() as $generator) {
            $array = array_merge($array, $generator->generator());
        }

        return $array;
    }
}