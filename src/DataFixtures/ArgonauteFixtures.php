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
            $argonaute = new Argonaute();
            $argonaute->setName($argonauteName);
            $manager->persist($argonaute);
            $manager->flush();
        }
    }
}
