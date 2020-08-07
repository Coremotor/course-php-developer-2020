<?php

abstract class Animal
{
    abstract function move();
}

abstract class Big extends Animal
{
    abstract function showSize();
}

class Fish extends Animal
{
    public function move()
    {
        echo 'Плыву' . PHP_EOL;
    }
}

class Tiger extends Animal
{
    public function move()
    {
        echo 'Быстро бегу' . PHP_EOL;
    }
}

class Bear extends Big
{
    public function move()
    {
        echo 'Медленно иду' . PHP_EOL;
    }

    public function showSize()
    {
        echo 'Большой мишка' . PHP_EOL;
    }
}

class Moose extends Big
{
    public function move()
    {
        echo 'Скачу' . PHP_EOL;
    }

    public function showSize()
    {
        echo 'Большой лось' . PHP_EOL;
    }
}

class Snake extends Animal
{
    public function move()
    {
        echo 'Ползу' . PHP_EOL;
    }
}

class Chicken extends Animal
{
    public function move()
    {
        echo 'Топчусь' . PHP_EOL;
    }
}

class Camel extends Animal
{
    public function move()
    {
        echo 'Иду и плююсь' . PHP_EOL;
    }
}

class Elephant extends Big
{
    public function move()
    {
        echo 'Тяжело иду' . PHP_EOL;
    }

    public function showSize()
    {
        echo 'Слон большой' . PHP_EOL;
    }
}

class Dolphin extends Animal
{
    public function move()
    {
        echo 'Плыву красиво' . PHP_EOL;
    }
}

$animal = new Elephant();
echo '<pre>';
$animal->move();
$animal->showSize();
echo '</pre>';
