<?php

namespace App\Sitemap;

class SitemapDto
{
    public function __construct(private string $url){}

    public function getUrl(): string
    {
        return $this->url;
    }
}
