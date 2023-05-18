<?php
include_once("Config.php");

require_once __DIR__ . "/../Entity/Product.php";
require_once __DIR__ . "/../Repository/ProductRepository.php";
require_once __DIR__ . "/../Service/ProductService.php";

use Entity\Product;
use Repository\ProductRepositoryImplement;
use Service\ProductServiceImplement;

function testShowProduct(): void
{
    $productRepository = new ProductRepositoryImplement();
    $productService = new ProductServiceImplement($productRepository);

    $productService->addProduct("Buku");
    echo "Buku berhasil ditambahkan" . PHP_EOL;
    $productService->addProduct("Pensil");
    echo "Pensil berhasil ditambahkan" . PHP_EOL;
    $productService->addProduct("Penghapus");
    echo "Penghapus berhasil ditambahkan" . PHP_EOL;

    $productService->showProduct();

    //DELETING
    echo "Menghapus Product Buku" . PHP_EOL;
    $productService->removeProduct(1);
    $productService->showProduct();

    //EDITING
    echo "Mengedit Product Pensil menjadi Penggaris" . PHP_EOL;
    $productService->editProduct(1, "Penggaris");
    $productService->showProduct();

    echo "Test Product Service Success" . PHP_EOL;
}

testShowProduct();
