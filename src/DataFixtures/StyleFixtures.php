<?php

namespace App\DataFixtures;

use App\Entity\Style;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class StyleFixtures extends Fixture
{
    public const FAKE_STYLE = [
        ['Science Fiction'],
        ['Fantastique'],
        ['Horreur'],
        ['Romance']
    ];

    public function load(ObjectManager $manager)
    {

        foreach(self::FAKE_STYLE as $fakeStyle) {
            $style = new Style();

            $style->setName($fakeStyle[0]);

                $manager->persist($style);
                $manager->flush();
            // $product = new Product();
            // $manager->persist($product);
        }
    }
}
