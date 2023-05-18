<?php

namespace Repository {

    use Entity\Product;

    interface ProductRepository
    {
        function save(Product $product): void;
        function remove(int $number): bool;
        function findAll(): array;
        function edit(int $number, Product $product): void;
    }

    class ProductRepositoryImplement implements ProductRepository
    {
        public array $product = array();

        function save(Product $product): void
        {
            $number = sizeof($this->product) + 1;
            $this->product[$number] = $product;
        }

        function remove(int $number): bool
        {
            if ($number > sizeof($this->product)) {
                return false;
            }
            for ($i = $number; $i < sizeof($this->product); $i++) {
                $this->product[$i] = $this->product[$i + 1];
            }

            unset($this->product[sizeof($this->product)]);
            return true;
        }

        function edit(int $number, Product $product): void
        {
            $this->product[$number] = $product;
        }

        function findAll(): array
        {
            return $this->product;
        }
    }
}
