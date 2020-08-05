<?php

class Forge
{
    public function burn($object)
    {
        $flame = $object->burn();
        echo $flame->render((string)$object->toString()) . PHP_EOL;
    }
}

class BlueFlame
{
    public function render($name)
    {
        return $name . ' - горит синим пламенем';
    }
}

class RedFlame
{
    public function render($name)
    {
        return $name . ' - горит Красным пламенем';
    }
}

class Smoke
{
    public function render($name)
    {
        return $name . ' - лишь дымиться';
    }
}

class Obj
{
    public $name;

    public function __construct($name)
    {
        $this->name = $name;
    }
}

class Obj1 extends Obj
{
    public function burn()
    {
        return new Smoke();
    }

    public function toString()
    {
        return $this->name;
    }
}

class Obj2 extends Obj
{
    public function burn()
    {
        return new RedFlame();
    }

    public function toString()
    {
        return $this->name;
    }
}

class Obj3 extends Obj
{
    public function burn()
    {
        return new Smoke();
    }

    public function toString()
    {
        return $this->name;
    }
}

class Obj4 extends Obj
{
    public function burn()
    {
        return new BlueFlame();
    }

    public function toString()
    {
        return $this->name;
    }
}

class Obj5 extends Obj
{
    public function burn()
    {
        return new RedFlame();
    }

    public function toString()
    {
        return $this->name;
    }
}

$paper = new Obj1('бумага');
$meat = new Obj2('мясо');
$mars = new Obj3('Планета Марс');
$plane = new Obj4('Самолет');
$VVP = new Obj5('ВВП');

$forge = new Forge();

echo '<pre>';
$forge->burn($paper);
$forge->burn($meat);
$forge->burn($mars);
$forge->burn($plane);
$forge->burn($VVP);
echo '</pre>';