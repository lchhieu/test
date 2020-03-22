<?php

namespace Tests\Services;

use Core\Classes\Product;
use Core\Services\ShippingService;
use PHPUnit\Framework\TestCase;

final class ShippingServiceTest extends TestCase
{
    public function testCanAddProduct()
    {
        $shippingService = new ShippingService();
        $product1 = new Product("Product 1", 200, 2.2, 2, 3, 0.1);
        $product2 = new Product("Product 2", 140, 1.4, 2, 4, 0.1);

        $shippingService->addProduct($product1);
        $shippingService->addProduct($product2);

        $this->assertEquals(
            2,
            count($shippingService->getProducts())
        );
    }

    public function testCalculateShipping()
    {
        global $secrets;

        $shippingService = new ShippingService();
        $product1 = new Product("Product 1", 200, 2.2, 2, 3, 0.1);
        $product2 = new Product("Product 2", 140, 1.4, 2, 4, 0.1);

        $shippingService->addProduct($product1);
        $shippingService->addProduct($product2);

        $this->assertEquals(
            379.6,
            $shippingService->calculate($secrets['coefficients'])
        );
    }
}