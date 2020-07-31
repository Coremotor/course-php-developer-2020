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
    public $products = [];

    public function addProduct(Product $product, $quantity)
    {
        //добавляет товар в корзину
    }

    public function getPrice()
    {
        //возвращает стоимость товаров в корзине
    }

    public function describe()
    {
        //выводит или возвращает информацию о корзине в виде строки: "<Наименование товара> — <Цена одной позиции> — <Количество>"
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
    }

    public function getPrice()
    {
        //возвращает стоимость товара
    }
}
