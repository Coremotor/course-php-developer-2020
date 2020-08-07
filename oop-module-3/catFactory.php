<?php

class Cat
{
    public $name;
    public $color;
    public $age;

    public function __construct($name, $color, $age)
    {
        $this->name = $name;
        $this->color = $color;
        $this->age = $age;
    }
}

class CatFactory
{
    public static function createBlack8YearsOldCat($name)
    {
        return new Cat($name, "Black", 8);
    }

    public static function createYellow7YearsOldCat($name)
    {
        return new Cat($name, "Yellow", 7);
    }

    public static function createGreen6YearsOldCat($name)
    {
        return new Cat($name, "Green", 6);
    }

    public static function createBlue5YearsOldCat($name)
    {
        return new Cat($name, "Blue", 5);
    }

    public static function createWhite4YearsOldCat($name)
    {
        return new Cat($name, "White", 4);
    }

    public static function createBrown3YearsOldCat($name)
    {
        return new Cat($name, "Brown", 3);
    }

    public static function createRed2YearsOldCat($name)
    {
        return new Cat($name, "Red", 2);
    }
}



$cats[] = [
    CatFactory::createBlack8YearsOldCat('Пушок'),
    CatFactory::createYellow7YearsOldCat('Рыжик'),
    CatFactory::createGreen6YearsOldCat('Пес'),
    CatFactory::createBlue5YearsOldCat('Барсик'),
    CatFactory::createWhite4YearsOldCat('Леопольд'),
    CatFactory::createBrown3YearsOldCat('Томас'),
    CatFactory::createRed2YearsOldCat('Кот в сапогах')
];

echo('<pre>');
print_r($cats);
echo('</pre>');