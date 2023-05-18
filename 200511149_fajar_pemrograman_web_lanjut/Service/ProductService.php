<?php

namespace Service {

    use Entity\Product;
    use Repository\ProductRepository;

    interface ProductService
    {
        function showProduct(): void;
        function addProduct(string $product): void;
        function removeProduct(int $number): void;
        function editProduct(int $number, string $product): void;
    }

    class ProductServiceImplement implements ProductService
    {
        private ProductRepository $productRepository;
        public function __construct(ProductRepository $productRepository)
        {
            $this->productRepository = $productRepository;
        }

        function showProduct(): void
        {
            //create loading 3 second
            echo "Loading";
            for ($i = 0; $i < 3; $i++) {
                echo ".";
                sleep(1);
            }
            system("clear");


            echo "====================" . PHP_EOL;
            echo "LIST PRODUCT" . PHP_EOL;
            echo "====================" . PHP_EOL;
            $product = $this->productRepository->findAll();
            if (empty($product)) {
                echo "Belum Ada Product" . PHP_EOL;
            }
            foreach ($product as $number => $value) {
                $product = $value->getProduct();
                echo "$number. $product" . PHP_EOL;
            }
            echo "====================" . PHP_EOL;
            echo "MENU" . PHP_EOL;
        }

        function addProduct(string $product): void
        {
            $product = new Product($product);
            $this->productRepository->save($product);
            echo "Berhasil Menambahkan Product" . PHP_EOL;
        }

        function removeProduct(int $number): void
        {
            //check if product exist
            if (!array_key_exists($number, $this->productRepository->findAll())) {
                echo "Product Tidak Ditemukan" . PHP_EOL;
                return;
            }
            if ($this->productRepository->remove($number)) {
                echo "Sukses Menghapus Product" . PHP_EOL;
            } else {
                echo "Gagal Menghapus Product" . PHP_EOL;
            }
        }

        function editProduct(int $number, string $product): void
        {
            //check if product exist
            if (!array_key_exists($number, $this->productRepository->findAll())) {
                echo "Product Tidak Ditemukan" . PHP_EOL;
                return;
            }
            $product = new Product($product);
            $this->productRepository->edit($number, $product);
            echo "Sukses Mengedit Product" . PHP_EOL;
        }
    }
}