<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{
    private UserPasswordHasherInterface $userPasswordHasher;

    public function __construct(UserPasswordHasherInterface $userPasswordHasher)
    {
        $this->userPasswordHasher = $userPasswordHasher;
    }

    public function load(ObjectManager $manager): void
    {
        $user1 = new User();
        $user1->setEmail('user@gmail.com');
        $user1->setPassword($this->userPasswordHasher->hashPassword($user1, 'User'));
        $user1->setRoles(['ROLE_USER']);
        $manager->persist($user1);

        $user2 = new User();
        $user2->setEmail('admin@gmail.com');
        $user2->setPassword($this->userPasswordHasher->hashPassword($user2, 'Admin'));
        $user2->setRoles(['ROLE_ADMIN']);
        $manager->persist($user2);

        $user3 = new User();
        $user3->setEmail('superadmin@gmail.com');
        $user3->setPassword($this->userPasswordHasher->hashPassword($user3, 'SuperAdmin'));
        $user3->setRoles(['ROLE_SUPER_ADMIN']);
        $manager->persist($user3);

        $manager->flush();
    }
}
