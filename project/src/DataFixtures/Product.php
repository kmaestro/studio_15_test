<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class Product extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();
        for ($i = 0; $i < 10; $i++) {
            $product = new \App\Entity\Product();
            $product->setTitle($faker->name);
            $product->setPublication(($i % 2) === 0);
            $manager->persist($product);
        }

        $manager->flush();
    }
}
