<?php

namespace Service {

    use Entity\Product;
    use Repository\ProductRepository;

    interface ProductService
    {
        function showProduct(): void;
        function addProduct(string $product, string $merk, string $warna, string $ukuran): void;
        function removeProduct(int $number): void;
        function editProduct(int $number, array $product): void;
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
            echo "PRODUCT LIST" . PHP_EOL;
            echo "====================" . PHP_EOL;
            $product = $this->productRepository->findAll();
            if (empty($product)) {
                echo "Belum Ada Product" . PHP_EOL;
            }
            foreach ($product as $number => $product) {
                //show product id, nama_barang, merk, warna, ukuran
                echo "ID: " . $product["id_barang"] . PHP_EOL;
                echo "Nama Barang: " . $product["nama_barang"] . PHP_EOL;
                echo "Merk: " . $product["merk"] . PHP_EOL;
                echo "Warna: " . $product["warna"] . PHP_EOL;
                echo "Ukuran: " . $product["ukuran"] . PHP_EOL;
                echo "====================" . PHP_EOL;
            }
            echo "MENU" . PHP_EOL;
        }

        function addProduct(string $product, string $merk, string $warna, string $ukuran): void
        {
            $product = new Product($product, $merk, $warna, $ukuran);
            $this->productRepository->save($product);
            echo "Sukses Menambahkan Product" . PHP_EOL;
        }

        function removeProduct(int $number): void
        {
            //check if product exist by id
            if (!$this->productRepository->isProductExist($number)) {
                echo "Product Tidak Ditemukan" . PHP_EOL;
                return;
            }

            $this->productRepository->remove($number);
            echo "Sukses Menghapus Product" . PHP_EOL;
        }

        function editProduct(int $id, array $product): void
        {
            //check if product exist by id
            if (!$this->productRepository->isProductExist($id)) {
                echo "Product Tidak Ditemukan" . PHP_EOL;
                return;
            }

            $product = new Product($product["nama_barang"], $product["merk"], $product["warna"], $product["ukuran"]);
            $this->productRepository->edit($id, $product);
            echo "Sukses Mengedit Product" . PHP_EOL;
        }
    }
}