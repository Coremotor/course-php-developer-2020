<?php

function var_dump_pre($mixed = null) {
    echo '<pre>';
    var_dump($mixed);
    echo '</pre>';
    return null;
}

class Cat {
    public $name;

    function __construct($animalName)
    {
        $this->name = $animalName;
    }
}

class Dog {
    public $name;

    function __construct($animalName)
    {
        $this->name = $animalName;
    }
}

class Fish {
    public $name;

    function __construct($animalName)
    {
        $this->name = $animalName;
    }
}

$firstCat = new Cat('Панарин');
$secondCat = new Cat('Овечкин');
$thirdCat = new Cat('Кучеров');
var_dump_pre($firstCat);
var_dump_pre($secondCat);
var_dump_pre($thirdCat);

$firstDog = new Dog('Мозякин');
$secondDog = new Dog('Зарипов');
$fourthDog = new Dog('Капризов');
$thirdDog = new Dog('Кузнецов');
$fifthDog = new Dog('Орлов');
var_dump_pre($firstDog);
var_dump_pre($secondDog);
var_dump_pre($fourthDog);
var_dump_pre($thirdDog);
var_dump_pre($fifthDog);

$firstFish = new Fish('Подъяпольский');
var_dump_pre($firstFish);

