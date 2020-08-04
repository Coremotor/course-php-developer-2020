<?php

class Cat
{
    public $name;

    function __construct($animalName)
    {
        $this->name = $animalName;
    }
}

class Dog
{
    public $name;

    function __construct($animalName)
    {
        $this->name = $animalName;
    }
}

class Fish
{
    public $name;

    function __construct($animalName)
    {
        $this->name = $animalName;
    }
}

$firstCat = new Cat('Панарин');
$secondCat = new Cat('Овечкин');
$thirdCat = new Cat('Кучеров');


$firstDog = new Dog('Мозякин');
$secondDog = new Dog('Зарипов');
$fourthDog = new Dog('Капризов');
$thirdDog = new Dog('Кузнецов');
$fifthDog = new Dog('Орлов');


$firstFish = new Fish('Подъяпольский');


