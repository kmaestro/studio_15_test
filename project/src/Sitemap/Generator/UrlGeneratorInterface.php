<?php

namespace App\Sitemap\Generator;

use App\Sitemap\SitemapDto;

interface UrlGeneratorInterface
{
    /**
     * @return SitemapDto[]
     */
    public function generator(): array;
}
