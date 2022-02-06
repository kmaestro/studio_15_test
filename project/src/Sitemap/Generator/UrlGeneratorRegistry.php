<?php

namespace App\Sitemap\Generator;


use App\Sitemap\SitemapDto;

class UrlGeneratorRegistry
{
    private array $generators;

    public function addGenerator(UrlGeneratorInterface $urlGeneratorService): void
    {
        $this->generators[] = $urlGeneratorService;
    }

    /**
     * @return \Generator<UrlGeneratorInterface>
     */
    public function getGenerators()
    {
        foreach ($this->generators as $generator) {
            yield $generator;
        }
    }
}
