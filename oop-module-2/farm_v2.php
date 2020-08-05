<?php

namespace farm_v2;

abstract class Animal
{
    abstract public function say();

//    abstract public function go();
}

abstract class FlyingAnimal extends Animal
{
    abstract public function tryToFly();
}

abstract class HoofAnimal extends Animal
{
    abstract public function walk();
}

class Cow extends HoofAnimal
{
    public function say()
    {
        echo "МУ-МУ";
    }

    public function walk()
    {
        echo "Корова идет на ферму - ТОП-ТОП</br>";
    }

}

class Pig extends HoofAnimal
{
    public function say()
    {
        echo "ХРЮ-ХРЮ";
    }

    public function walk()
    {
        echo "Хрюшка идет на ферму - ТОП-ТОП</br>";
    }

}

class Horse extends HoofAnimal
{
    public function say()
    {
        echo "ИГОГО-ИГОГО";
    }

    public function walk()
    {
        echo "Конь идет на ферму - ТОП-ТОП</br>";
    }

}

class Chicken extends FlyingAnimal
{
    public function say()
    {
        echo "КО-КО-КО";
    }

    public function tryToFly()
    {
        echo "Курица пытается лететь на ферму - Вжих-вжих-топ-топ</br>";
    }

    public function walk()
    {
        $this->tryToFly();
    }
}

class Goose extends FlyingAnimal
{
    public function say()
    {
        echo "ГА-ГА-ГА";
    }

    public function tryToFly()
    {
        echo "Важный гусь пытается лететь на ферму - Вжих-вжих-топ-топ</br>";
    }

    public function walk()
    {
        $this->tryToFly();
    }
}

class Turkey extends FlyingAnimal
{
    public function say()
    {
        echo "КУЛДЫК-КУЛДЫК";
    }

    public function tryToFly()
    {
        echo "Индюк пытается лететь на ферму - Вжих-вжих-топ-топ</br>";
    }

    public function walk()
    {
        $this->tryToFly();
    }
}

class Farm
{
    public $animals = [];

    public function addAnimal(Animal $animal)
    {

    }
}

class BirdFarm extends Farm
{
    public function addAnimal(Animal $animal)
    {
        $animal->walk();
        $this->showAnimalsCount();
    }


    public function showAnimalsCount()
    {
        $q = count($this->animals);
        echo "<h4>Птиц на ферме: $q шт.</h4></br>";
    }
}

class HoofFarm extends Farm
{
    public function addAnimal(Animal $animal)
    {
        $animal->walk();
    }
}

class Farmer
{
    public function addAnimal(Farm $farm, Animal $animal)
    {
        $farm->animals[] = $animal;
        $farm->addAnimal($animal);
    }

    public function rollCall(Farm $farm, $type)
    {
        echo "$type</br>";
        foreach ($farm->animals as $key => $animal) {
            echo '<pre>';
            $number = $key + 1;
            echo "$number - ";
            $animal->say();
            echo '</pre>';
        }
    }
}

$birdFarm = new BirdFarm();
$hoofFarm = new HoofFarm();
$farmer = new Farmer();

$farmer->addAnimal($hoofFarm, new Cow());
$farmer->addAnimal($hoofFarm, new Pig());
$farmer->addAnimal($hoofFarm, new Pig());
$farmer->addAnimal($birdFarm, new Chicken());
$farmer->addAnimal($birdFarm, new Turkey());
$farmer->addAnimal($birdFarm, new Turkey());
$farmer->addAnimal($birdFarm, new Turkey());
$farmer->addAnimal($hoofFarm, new Horse());
$farmer->addAnimal($hoofFarm, new Horse());
$farmer->addAnimal($birdFarm, new Goose());

$farmer->rollCall($hoofFarm, 'Копытные: ');
$farmer->rollCall($birdFarm, 'Птица: ');
