<?php

$names = ['Кукла Маша', 'Кукла Даша', 'Медведь из кустов', 'Початок Боб', 'Веселые мопсы'];
$summary = [];

class ToyFactory
{
    public function createToy($name)
    {
        return new Toy($name, rand(1, 1000));
    }
}

class Toy
{
    public $name;
    public $price;

    function __construct($name, $price)
    {
        $this->name = $name;
        $this->price = $price;
    }
}

for ($i = 0; $i <= rand(5, 20); $i++) {
    $toy = (new ToyFactory)->createToy($names[rand(0, count($names) - 1)]);
    echo '<pre>';
    echo "Прекрассная игрушка: $toy->name стоимостью $toy->price тычяч долларов США";
    echo '</pre>';
    array_push($summary, $toy->price);
}
$sum = array_sum($summary);
echo "Cтоимость всех игрушек: $sum тысяч долларов США";