<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{

    public const FAKE_USER = [
        ['ab@gmail.com'],
        ['Marc','Antoine','ma@gmail.com']
    ];
    
    private UserPasswordHasherInterface $userPasswordHasher;

    public function __construct(UserPasswordHasherInterface $userPasswordHasher)
    {
        $this->userPasswordHasher = $userPasswordHasher;
    }

    public function load(ObjectManager $manager)
    {

        for ($x = 0; $x <= 10; $x++) {
            $user = new User();

            $user->setEmail('ab@gmail.com')
                ->setRoles([])
                ->setPassword(
                    $this->userPasswordHasher->hashPassword($user, 'a')
                );

                $manager->persist($user);
            // $product = new Product();
            // $manager->persist($product);
        }

        $manager->persist($this->createAdminUser());
        $manager->flush();

        $manager->flush();
    }

    private function createAdminUser(): User
    {
        $admin = new User;

        $admin->setEmail('a@a.com')
        ->setRoles([])
        ->setPassword(
            $this->userPasswordHasher->hashPassword($admin, 'a')
        );

        return $admin;
    }
}
