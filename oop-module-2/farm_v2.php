<?php
namespace farm_v2;

abstract class Animal
{
    abstract public function say();
    abstract public function walk();
}

class Cow extends Animal
{
    public function say() {
        echo "МУ-МУ";
    }

    public function walk() {
        echo "Корова идет на ферму - ТОП-ТОП</br>";
    }
}

class Pig extends Animal
{
    public function say() {
        echo "ХРЮ-ХРЮ";
    }

    public function walk() {
        echo "Хрюшка идет на ферму - ТОП-ТОП</br>";
    }
}

class Chicken extends Animal
{
    public function say() {
        echo "КО-КО-КО";
    }

    public function walk() {
        echo "Курица идет на ферму - ТОП-ТОП</br>";
    }
}

class Farm
{
    public $animals = [];

    public function addAnimal(Animal $animal) {
        $animal->walk();
        $this->animals[] = $animal;
    }

    public function rollCall() {
        echo 'Перекличка:</br>';
        shuffle($this->animals);
        foreach ($this->animals as $animal) {
            echo '<pre>';
            $animal->say();
            echo '</pre>';
        }
    }
}

$farm = new Farm();

$farm->addAnimal(new Cow());
$farm->addAnimal(new Pig());
$farm->addAnimal(new Pig());
$farm->addAnimal(new Chicken());

$farm->rollCall();