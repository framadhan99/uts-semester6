<?php

namespace Entity {
    class Product
    {
        private string $product;

        public function __construct(string $product = "")
        {
            $this->product = $product;
        }

        public function getProduct(): string
        {
            return $this->product;
        }

        public function setProduct(string $product): void
        {
            $this->product = $product;
        }
    }
}
