<?php

require $_SERVER['DOCUMENT_ROOT'] . '/oop-module-1/task_4.php';

use task_4\User;

class Order
{
    public $basket;

    public function __construct(Basket $basket)
    {
        $this->basket = $basket;
    }

    public function getBasket()
    {
        //возврат корзины товара
        $this->basket->describe();
    }

    public function getPrice()
    {
        //возвращает общую стоимость товаров
        return $this->basket->getPrice();
    }
}

class Basket
{
    public $productsInBasket = [];
    public $summaryPrice = 0;

    public function addProduct(Product $product, $quantity)
    {
        //добавляет товар в корзину
        $this->productsInBasket[] = [
            'product' => $product,
            'quantity' => $quantity,
        ];
        return $this->productsInBasket;
    }

    public function getPrice()
    {
        //возвращает стоимость товаров в корзине
        $this->summaryPrice = 0;
        foreach ($this->productsInBasket as $key) {
            $this->summaryPrice += $key['product']->productPrice * $key['quantity'];
        }
        return $this->summaryPrice;
    }

    public function describe()
    {
        //выводит или возвращает информацию о корзине в виде строки: "<Наименование товара> — <Цена одной позиции> — <Количество>"
        foreach ($this->productsInBasket as $key) {
            echo "{$key['product']->productName} - {$key['product']->productPrice} кр. - {$key['quantity']} шт.<br />";
        }
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

$order = new Order($basket);

$user = new User('Гуль Иван Иваныч', 'gull@fallout.rad', 'unknown', '249');

$user->notify("Для вас создан заказ, на сумму: {$order->getPrice()} кр. <br /> Состав:");
$order->getBasket();

