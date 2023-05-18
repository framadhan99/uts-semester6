<?php

require_once __DIR__ . "/../Entity/Product.php";
require_once __DIR__ . "/../Repository/ProductRepository.php";
require_once __DIR__ . "/../Service/ProductService.php";
require_once __DIR__ . "/../View/ProductView.php";
require_once __DIR__ . "/../Helper/InputHelper.php";

use Entity\Product;
use Repository\ProductRepositoryImplement;
use Service\ProductServiceImplement;
use View\ProductView;

function testProductView(): void
{
    $productRepository = new ProductRepositoryImplement();
    $productService = new ProductServiceImplement($productRepository);
    $productView = new ProductView($productService);

    $productService->addProduct("Buku");
    $productService->addProduct("Pensil");
    $productService->addProduct("Penghapus");

    $productView->showProduct();

    $productView->removeProduct();

    $productView->showProduct();

    $productView->removeProduct();

    $productView->showProduct();

    $productView->addProduct();

    $productView->showProduct();

    $productView->editProduct();

    $productView->showProduct();
}

testProductView();
