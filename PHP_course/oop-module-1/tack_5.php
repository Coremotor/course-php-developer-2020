<?php

class Order
{
    public $basket;

    public function getBasket()
    {
        //возврат корзины товара
    }

    public function getPrice()
    {
        //возвращает общую стоимость товаров
    }


}

class Basket
{
    public $productsInBasket = [];

    public function addProduct(Product $product, $quantity)
    {
        //добавляет товар в корзину
        array_push($this->productsInBasket, [$product, $quantity]);
    }

    public function getPrice()
    {
        //возвращает стоимость товаров в корзине
    }

    public function describe()
    {
        //выводит или возвращает информацию о корзине в виде строки: "<Наименование товара> — <Цена одной позиции> — <Количество>"
    }

    public function vdArr() {
        echo '<pre>';
        var_dump($this->productsInBasket);
        echo '</pre>';
    }
}

class Product
{
    public $productName;
    public $productPrice;

    function __construct($productName, $productPrice)
    {
        $this->productName = $productName;
        $this->productPrice = $productPrice;
    }

    public function getName()
    {
        //возвращает наименование товара
        return $this->productName;
    }

    public function getPrice()
    {
        //возвращает стоимость товара
        return $this->productPrice;
    }
}

$firstProduct = new Product('Nuka cola', 1000);
$secondProduct = new Product('Psycho', 3000);
$thirdProduct = new Product('Power armor', 300000);

$basket = new Basket();

$basket->addProduct($firstProduct, 10);
$basket->addProduct($secondProduct, 200);
$basket->addProduct($thirdProduct, 3);

$basket->vdArr();
