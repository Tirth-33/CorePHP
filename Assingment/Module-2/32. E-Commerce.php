<?php

// Category class
class Category {
    private $name;

    public function __construct($name) {
        $this->name = $name;
    }

    // Getter
    public function getName() {
        return $this->name;
    }

    // Setter
    public function setName($name) {
        $this->name = $name;
    }
}

// Product class
class Product {
    private $name;
    private $price;
    private $category; // Category object

    public function __construct($name, $price, Category $category) {
        $this->name = $name;
        $this->price = $price;
        $this->category = $category;
    }

    // Getters
    public function getName() {
        return $this->name;
    }

    public function getPrice() {
        return $this->price;
    }

    public function getCategory() {
        return $this->category;
    }

    // Setters
    public function setName($name) {
        $this->name = $name;
    }

    public function setPrice($price) {
        if ($price >= 0) {
            $this->price = $price;
        }
    }

    public function setCategory(Category $category) {
        $this->category = $category;
    }
}

// Order class
class Order {
    private $products = [];

    public function addProduct(Product $product) {
        $this->products[] = $product;
    }

    public function removeProduct(Product $product) {
        foreach ($this->products as $key => $p) {
            if ($p === $product) {
                unset($this->products[$key]);
                break;
            }
        }
    }

    public function getTotal() {
        $total = 0;
        foreach ($this->products as $product) {
            $total += $product->getPrice();
        }
        return $total;
    }

    public function listProducts() {
        $names = [];
        foreach ($this->products as $product) {
            $names[] = $product->getName();
        }
        return $names;
    }
}