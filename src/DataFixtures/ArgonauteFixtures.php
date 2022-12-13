<?php

namespace App\DataFixtures;

use App\Entity\Argonaute;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ArgonauteFixtures extends Fixture
{
    public const NAME = [
        'Eleftheria',
        'Gennadios',
        'Lysimachos',

    ];
    public function load(ObjectManager $manager)
    {
        foreach (self::NAME as $argonauteName) {
            $category = new Argonaute();
            $category->setName($argonauteName);
            $manager->persist($category);
            $manager->flush();
        }
    }
}
