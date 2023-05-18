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
            // Meminta input nama product, merk, warna, dan ukuran
            echo "Menambahkan Product" . PHP_EOL;

            $product = InputHelper::input("Nama Product (x untuk batal) ");
            if ($product == "x") {
                echo "Batal menambahkan Product" . PHP_EOL;
            } else {
                $merk = InputHelper::input("Merk (x untuk batal) ");
                if ($merk == "x") {
                    echo "Batal menambahkan Product" . PHP_EOL;
                } else {
                    $warna = InputHelper::input("Warna (x untuk batal) ");
                    if ($warna == "x") {
                        echo "Batal menambahkan Product" . PHP_EOL;
                    } else {
                        $ukuran = InputHelper::input("Ukuran (x untuk batal) ");
                        if ($ukuran == "x") {
                            echo "Batal menambahkan Product" . PHP_EOL;
                        } else {
                            $this->productService->addProduct($product, $merk, $warna, $ukuran);
                        }
                    }
                }
            }
        }

        function removeProduct(): void
        {
            echo "Menghapus Product" . PHP_EOL;


            $pilihan = InputHelper::input("ID Product (x untuk batal) ");
            if ($pilihan == "x") {
                echo "Batal menghapus Product" . PHP_EOL;
            } else {
                //hanya menerima inputan angka
                if (is_numeric($pilihan)) {
                    $this->productService->removeProduct($pilihan);
                } else {
                    echo "ID Product harus angka" . PHP_EOL;
                }
            }
        }

        function editProduct(): void
        {
            echo "Mengedit Product" . PHP_EOL;

            $pilihan = InputHelper::input("ID Product (x untuk batal) ");
            if ($pilihan == "x") {
                echo "Batal mengedit Product" . PHP_EOL;
            } else {
                //hanya menerima inputan angka
                if (is_numeric($pilihan)) {
                    $product = InputHelper::input("Nama Product (x untuk batal) ");
                    if ($product == "x") {
                        echo "Batal mengedit Product" . PHP_EOL;
                    } else {
                        $merk = InputHelper::input("Merk (x untuk batal) ");
                        if ($merk == "x") {
                            echo "Batal mengedit Product" . PHP_EOL;
                        } else {
                            $warna = InputHelper::input("Warna (x untuk batal) ");
                            if ($warna == "x") {
                                echo "Batal mengedit Product" . PHP_EOL;
                            } else {
                                $ukuran = InputHelper::input("Ukuran (x untuk batal) ");
                                if ($ukuran == "x") {
                                    echo "Batal mengedit Product" . PHP_EOL;
                                } else {
                                    $this->productService->editProduct($pilihan, [
                                        "nama_barang" => $product,
                                        "merk" => $merk,
                                        "warna" => $warna,
                                        "ukuran" => $ukuran
                                    ]);
                                }
                            }
                        }
                    }
                } else {
                    echo "ID Product harus angka" . PHP_EOL;
                }
            }
        }
    }
}
