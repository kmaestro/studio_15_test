<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class News extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();
        for ($i = 0; $i < 10; $i++) {
            $news = new \App\Entity\News();
            $news->setTitle($faker->name);
            $news->setPublication(($i % 2) === 0);
            $manager->persist($news);
        }

        $manager->flush();
    }
}
