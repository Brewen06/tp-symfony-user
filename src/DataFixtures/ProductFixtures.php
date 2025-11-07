<?php

namespace App\DataFixtures;

use App\Entity\Product;
use App\Entity\Category;
use App\DataFixtures\CategoryFixtures;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class ProductFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $product1 = new Product();
        $product1->setLabel('Vis étoile');
        $product1->setPriceHt(0.10);
        $product1->setPriceTva(0.02);
        $product1->setPriceTtc(0.12);
        $product1->setDescription('Vis à tête étoile pour assemblage bois.');
        $product1->addCategory($this->getReference(CategoryFixtures::CATEGORY_QUINCAILLERIE, Category::class));
        $manager->persist($product1);

        $product2 = new Product();
        $product2->setLabel('Vis allen');
        $product2->setPriceHt(0.15);
        $product2->setPriceTva(0.03);
        $product2->setPriceTtc(0.18);
        $product2->setDescription('Vis à tête allen pour assemblage métal.');
        $product2->addCategory($this->getReference(CategoryFixtures::CATEGORY_QUINCAILLERIE, Category::class));
        $manager->persist($product2);

        $manager->flush();
    }
    public function getDependencies(): array
    {
        return [
            CategoryFixtures::class,
        ];
    }
}
