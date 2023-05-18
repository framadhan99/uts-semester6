<?php

namespace Repository {

    use Entity\Product;
    use PDO;

    interface ProductRepository
    {
        function save(Product $product): void;
        function remove(int $number): bool;
        function findAll(): array;
        function edit(int $number, Product $product): void;
        function isProductExist(int $id): bool;
    }

    class ProductRepositoryImplement implements ProductRepository
    {
        public array $product = array();
        private PDO $connection;

        public function __construct(PDO $connection)
        {
            $this->connection = $connection;
        }

        function save(Product $product): void
        {
            $sql = "INSERT INTO product (nama_barang, merk, warna, ukuran) VALUES (:nama_barang, :merk, :warna, :ukuran)";
            $stmt = $this->connection->prepare($sql);
            $stmt->execute([
                ":nama_barang" => $product->getProduct()["product"],
                ":merk" => $product->getProduct()["merk"],
                ":warna" => $product->getProduct()["warna"],
                ":ukuran" => $product->getProduct()["ukuran"]
            ]);
        }

        function remove(int $number): bool
        {
            try {
                $sql = "DELETE FROM product WHERE id_barang = :id";
                $stmt = $this->connection->prepare($sql);
                $stmt->execute([
                    ":id" => $number
                ]);
                return true;
            } catch (\Throwable $th) {
                return false;
            }
        }

        function findAll(): array
        {
            $sql = "SELECT * FROM product";
            $stmt = $this->connection->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }

        function edit(int $number, Product $product): void
        {
            $sql = "UPDATE product SET nama_barang = :nama_barang, merk = :merk, warna = :warna, ukuran = :ukuran WHERE id_barang = :id";
            $stmt = $this->connection->prepare($sql);
            $stmt->execute([
                ":nama_barang" => $product->getProduct()["product"],
                ":merk" => $product->getProduct()["merk"],
                ":warna" => $product->getProduct()["warna"],
                ":ukuran" => $product->getProduct()["ukuran"],
                ":id" => $number
            ]);
        }

        function isProductExist(int $id): bool
        {
            $sql = "SELECT * FROM product WHERE id_barang = :id";
            $stmt = $this->connection->prepare($sql);
            $stmt->execute([
                ":id" => $id
            ]);
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if (empty($result)) {
                return false;
            }
            return true;
        }
    }
}
