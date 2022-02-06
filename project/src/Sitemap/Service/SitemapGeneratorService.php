<?php

namespace App\Sitemap\Service;

use App\Sitemap\SitemapDto;

class SitemapGeneratorService
{
    public function __construct(private string $path)
    {
    }

    /**
     * @param SitemapDto[] $urls
     * @return void
     */
    public function execute(array $urls)
    {
        $xml = simplexml_load_string('<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
 xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
 xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 
 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd"></urlset>');

        foreach ($urls as $sitemapDto) {
            $xml
                ->addChild('loc')
                ->addChild('url', $sitemapDto->getUrl());
        }

        $xml->asXML($this->path);
    }
}