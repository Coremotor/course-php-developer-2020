<?php

class HungryCat
{
    public $name;
    public $color;
    public $food;

    function __construct($name, $color, $food)
    {
        $this->name = $name;
        $this->color = $color;
        $this->food = $food;
    }

    public function eat($food)
    {
        echo "Голодный кот $this->name, особые приметы: цвет - $this->color. Cъел $food.</br>";
        if ($this->food === $food) {
            echo "И замурчал 'мррррр' от своей любимой еды</br>";
        } else {
            echo "Бееее...</br>";
        }
    }
}

$firstCat = new HungryCat('Alex', 'green', 'Proplan');
$firstCat->eat('банан');
$firstCat->eat('каку');
$firstCat->eat('арбуз');
$firstCat->eat('плесень');
$firstCat->eat('Proplan');

$secondCat = new HungryCat('Poul', 'red', 'Wiskas');
$secondCat->eat('бумага');
$secondCat->eat('домашнее задание');
$secondCat->eat('человека');
$secondCat->eat('гель для дезинфекции рук');
$secondCat->eat('Wiskas');

