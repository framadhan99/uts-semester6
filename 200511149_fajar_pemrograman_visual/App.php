<?php

require_once __DIR__ . "/Entity/Product.php";
require_once __DIR__ . "/Helper/InputHelper.php";
require_once __DIR__ . "/Repository/ProductRepository.php";
require_once __DIR__ . "/Service/ProductService.php";
require_once __DIR__ . "/View/ProductView.php";
require_once __DIR__ . "/Config/Database.php";

use \Repository\ProductRepositoryImplement;
use \Service\ProductServiceImplement;
use \View\ProductView;

echo "====================" . PHP_EOL;
echo "Aplikasi Product" . PHP_EOL;
echo "====================" . PHP_EOL;

$connection =   \Config\Database::getConnection();
$productRepository = new ProductRepositoryImplement($connection);
$productService = new ProductServiceImplement($productRepository);
$productView = new ProductView($productService);

$productView->showProduct();
