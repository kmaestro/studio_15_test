<?php

namespace App\Sitemap\Generator;

use App\Repository\NewsRepository;
use App\Sitemap\SitemapDto;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface as SymfonyUrlGeneratorInterface;

class NewsUrlGenerator implements UrlGeneratorInterface
{
    public function __construct(
        private NewsRepository               $newsRepository,
        private SymfonyUrlGeneratorInterface $urlGenerator
    )
    {
    }

    public function generator(): array
    {
        $array = [];
        foreach ($this->newsRepository->findBy(['publication' => true]) as $news) {
            $array[] = new SitemapDto(
                $this->urlGenerator->generate(
                    'news_show',
                    ['id' => $news->getId()],
                    SymfonyUrlGeneratorInterface::ABSOLUTE_URL
                )
            );
        }

        return $array;
    }
}