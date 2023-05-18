<?php

require_once __DIR__ . "/../Entity/Product.php";
require_once __DIR__ . "/../Repository/ProductRepository.php";
require_once __DIR__ . "/../Service/ProductService.php";
require_once __DIR__ . "/../Config/Database.php";

use Entity\Product;
use Repository\ProductRepositoryImplement;
use Service\ProductServiceImplement;

function deleteAllData()
{
    $connection =  \Config\Database::getConnection();
    $sql = "DELETE FROM product";
    $stmt = $connection->prepare($sql);
    $stmt->execute();
}

function testShowProduct(): void
{
    echo "Start Testing" . PHP_EOL;
    $connection =  \Config\Database::getConnection();
    $productRepository = new ProductRepositoryImplement($connection);
    $productService = new ProductServiceImplement($productRepository);

    //insert testing
    $productService->addProduct("Sepatu", "Nike", "Merah", "42");
    $productService->addProduct("Sepatu", "Adidas", "Biru", "42");
    $productService->addProduct("Sepatu", "Puma", "Hijau", "42");
    echo "Insert Testing Done" . PHP_EOL;

    //testing update
    //get random id from database
    $product = $productRepository->findAll();
    $randomArray = array_rand($product);
    $randomId = $product[$randomArray]["id_barang"];
    $productService->editProduct($randomId, [
        "nama_barang" => "Sepatu",
        "merk" => "Nike",
        "warna" => "Merah",
        "ukuran" => "42"
    ]);
    echo "Update Testing Done" . PHP_EOL;

    //testing delete
    //get random id from database
    $product = $productRepository->findAll();
    $randomArray = array_rand($product);
    $randomId = $product[$randomArray]["id_barang"];
    $productService->removeProduct($randomId);
    echo "Delete Testing Done" . PHP_EOL;
}
deleteAllData();
testShowProduct();
