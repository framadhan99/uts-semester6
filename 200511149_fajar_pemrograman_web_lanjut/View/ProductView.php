<?php

namespace View {

    use Service\ProductService;
    use Helper\InputHelper;

    class ProductView
    {
        private ProductService $productService;

        public function __construct(ProductService $productService)
        {
            $this->productService = $productService;
        }

        function showProduct(): void
        {
            while (true) {
                $this->productService->showProduct();
                echo "1. Tambah Product" . PHP_EOL;
                echo "2. Hapus Product" . PHP_EOL;
                echo "3. Edit Product" . PHP_EOL;
                echo "x. Keluar" . PHP_EOL;

                $pilihan = InputHelper::input("Pilih");

                if ($pilihan == "1") {
                    $this->addProduct();
                } else if ($pilihan == "2") {
                    $this->removeProduct();
                } else if ($pilihan == "3") {
                    $this->editProduct();
                } else if ($pilihan == "x") {
                    break;
                } else {
                    echo "Pilihan tidak dimengerti" . PHP_EOL;
                }
            }
            echo "Sampai Jumpa Lagi" . PHP_EOL;
        }

        function addProduct(): void
        {
            echo "Menambahkan Product" . PHP_EOL;
            $product = InputHelper::input("Product(x untuk Batal)");
            if ($product == "x") {
                echo "Gagal Menambah Product" . PHP_EOL;
            } else {
                $this->productService->addProduct($product);
            }
        }

        function removeProduct(): void
        {
            echo "Menghapus Product" . PHP_EOL;

            $pilihan = InputHelper::input("Nomor (x untuk batal) ");
            if ($pilihan == "x") {
                echo "Batal menghapus Product" . PHP_EOL;
            } else {
                $this->productService->removeProduct($pilihan);
            }
        }

        function editProduct(): void
        {
            echo "Mengedit Product" . PHP_EOL;

            $pilihan = InputHelper::input("Nomor (x untuk batal) ");
            if ($pilihan == "x") {
                echo "Batal mengedit Product" . PHP_EOL;
            } else {
                $product = InputHelper::input("Product (x untuk batal) ");
                if ($product == "x") {
                    echo "Batal mengedit Product" . PHP_EOL;
                } else {
                    $this->productService->editProduct($pilihan, $product);
                }
            }
        }
    }
}
