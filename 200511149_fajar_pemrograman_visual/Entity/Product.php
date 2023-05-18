<?php

namespace Entity {
    class Product
    {
        private array $product = array();

        public function __construct(string $product, string $merk, string $warna, string $ukuran)
        {
            $this->product["product"] = $product;
            $this->product["merk"] = $merk;
            $this->product["warna"] = $warna;
            $this->product["ukuran"] = $ukuran;
        }

        public function getProduct(): array
        {
            return $this->product;
        }

        public function setProduct(array $product): void
        {
            $this->product = $product;
        }
    }
}
