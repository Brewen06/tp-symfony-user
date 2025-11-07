<?php

namespace App\Tests;

use App\Entity\Product;
use PHPUnit\Framework\TestCase;

class ProductTest extends TestCase
{

    public function testProduct(): void
    {
        $product = new Product();
        $product->setLabel("Test Product");
        $product->setPriceHt(100);
        $product->setPriceTva(20);

        $this->assertEquals('Test Product', $product->getLabel());
        $this->assertEquals(120, $product->getPriceTtc());
    }
}
