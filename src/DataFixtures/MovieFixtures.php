<?php

namespace App\DataFixtures;

use App\Entity\Movie;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class MovieFixtures extends Fixture
{
    public const FAKE_MOVIES = [
        [
            'Dune',
            'Dans un futur lointain de l\'humanité, le Duc Leto Atréides reçoit de l’Empereur Shaddam IV le fief de la très profitable et très dangereuse planète désertique Arrakis.',
            '2021-09-15 00:00:00'
        ],
        [
            'Mourir peut attendre',
            'Dans MOURIR PEUT ATTENDRE, Bond a quitté les services secrets et coule des jours heureux en Jamaïque. Mais sa tranquillité est de courte durée car son...',
            '2021-10-06 00:00:00'
        ],
        [
            'Boîte noire',
            'Que s’est-il passé à bord du vol Dubaï-Paris avant son crash dans le massif alpin ?',
            '2021-09-08 00:00:00'
        ],
        [
            'Candyman',
            'D’aussi loin qu’ils s’en souviennent, les habitants de Cabrini Green, une des cités les plus insalubres en plein cœur de ...',
            '2021-09-29 00:00:00'
        ]
    ];

    public function load(ObjectManager $manager)
    {

        foreach(self::FAKE_MOVIES as $fakemovie) {
            $movie = new Movie();

            $movie->setName($fakemovie[0])
            ->setDescription($fakemovie[1])
            ->setReleaseDate(new \DateTime($fakemovie[2]));

                $manager->persist($movie);
                $manager->flush();
            // $product = new Product();
            // $manager->persist($product);
        }
    }
    
}
