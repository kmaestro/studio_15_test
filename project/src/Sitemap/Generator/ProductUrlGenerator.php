<?php

namespace App\Sitemap\Generator;

use App\Repository\ProductRepository;
use App\Sitemap\SitemapDto;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface as SymfonyUrlGeneratorInterface;

class ProductUrlGenerator implements UrlGeneratorInterface
{
    public function __construct(
        private ProductRepository            $productRepository,
        private SymfonyUrlGeneratorInterface $urlGenerator
    )
    {
    }

    public function generator(): array
    {
        $array = [];
        foreach ($this->productRepository->findBy(['publication' => true]) as $product) {
            $array[] = new SitemapDto(
                $this->urlGenerator->generate(
                    'product_show',
                    ['id' => $product->getId()],
                    SymfonyUrlGeneratorInterface::ABSOLUTE_URL
                )
            );
        }

        return $array;
    }
}