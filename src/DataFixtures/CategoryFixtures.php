<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class CategoryFixtures extends Fixture
{
    public const CATEGORY_QUINCAILLERIE = 'quincaillerie';
    public const CATEGORY_CUISINE = 'cuisine';

    public function load(ObjectManager $manager): void
    {
        $category1 = new Category();
        $category1->setLabel('Quincaillerie');
        $manager->persist($category1);

        $category2 = new Category();
        $category2->setLabel('Cuisine');
        $manager->persist($category2);

        $manager->flush();

        $this->addReference(self::CATEGORY_QUINCAILLERIE, $category1);
        $this->addReference(self::CATEGORY_CUISINE, $category2);
    }
}
