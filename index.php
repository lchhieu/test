<?php

use Core\Classes\Product;
use Core\Environment;
use Core\Services\ShippingService;

$app_root = dirname(__FILE__);
require_once "$app_root/vendor/autoload.php";

//require configurable
require_once "$app_root/setup.php";

$shippingService = new ShippingService();
$product1 = new Product("Product 1", 200, 2.2, 2, 3, 0.1);
$product2 = new Product("Product 2", 140, 1.4, 2, 4, 0.1);

$shippingService->addProduct($product1);
$shippingService->addProduct($product2);
$grossPrice = $shippingService->calculate($secrets['coefficients']);

echo "Shipping products: $grossPrice";