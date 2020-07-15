<?php

namespace App\DataFixtures;

use \DateTime;
use App\Entity\Tag;
use App\Entity\Post;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('fr_FR');

        for ($i = 1; $i < 3; $i++) {
            $tag = new Tag();
            $tag = $tag->setName($faker->words($nb = 3, $asText = true));
            $manager->persist($tag);        
        }
        $manager->flush();

        for ($i = 1; $i < 3; $i++){
            $post = new Post();
            $post = $post->setTitle($faker->sentence($nbWords = 6, $variableNbWords = true) );
            $post = $post->setBody($faker->text($maxNbChars = 1000));
            $post = $post->setPublishDate ($faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now', $timezone = null));
            $post = $post->addTag ($tag);
            $manager->persist($post);
        }

        $manager->flush();
    }
}
