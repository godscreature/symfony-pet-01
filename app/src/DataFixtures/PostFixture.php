<?php

namespace App\DataFixtures;

use App\Entity\Post;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Faker\Generator;

class PostFixture extends Fixture
{
    private Generator $faker;

    public function __construct()
    {
        $this->faker = Factory::create();
    }

    public function load(ObjectManager $manager): void
    {
        for ($i = 0; $i < 50; $i++) {
            $manager->persist($this->getPost());
        }
        $manager->flush();
    }

    private function getPost(): Post
    {
        return new Post(
            title: $this->faker->sentence(10),
            content: $this->faker->sentence(20)
        );
    }
}
