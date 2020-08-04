<?php

namespace blackBox;

class BlackBox
{
    private $data = [];

    public function addLog($message)
    {
        $this->data[] = $message;
    }

    public function getDataByEngineer(Engineer $engineer)
    {
        return $this->data;
    }
}

class Plane
{
    private $blackBox;
    private $maneuvers = ['Полет нормальный', 'Вираж вправо', 'Вираж влево', 'Вираж вниз', 'Вираж вверх', 'Бочка', 'Мертвая петля'];

    public function __construct(BlackBox $blackBox)
    {
        $this->blackBox = $blackBox;
    }

    public function FlyAndCrush()
    {
        $this->flyProcess();
        $this->crushProcess();
    }

    public function flyProcess()
    {
        $this->addLog('Взлет');

        shuffle($this->maneuvers);

        foreach ($this->maneuvers as $key) {
            $this->addLog($key);
        }
    }

    public function crushProcess()
    {
        $this->addLog('Упал на мягкое место, все живы здоровы!!!');
    }

    protected function addLog($message)
    {
        $this->blackBox->addLog($message);
    }

    public function getBoxForEngineer(Engineer $engineer)
    {
        $engineer->setBox($this->blackBox);
    }
}

class Engineer
{
    public $blackBox;

    public function setBox(BlackBox $blackBox)
    {
        $this->blackBox = $blackBox;
    }

    public function takeBox(Plane $plane)
    {
        $plane->getBoxForEngineer($this);
    }

    public function decodeBox()
    {
        echo('<pre>');
        print_r($this->blackBox->getDataByEngineer($this));
        echo('</pre>');
    }
}


$firstPlane = new Plane(new BlackBox());
$firstPlane->FlyAndCrush();
$engineer = new Engineer();
$firstPlane->getBoxForEngineer($engineer);
$engineer->takeBox($firstPlane);
$engineer->decodeBox();

$secondPlane = new Plane(new BlackBox());
$secondPlane->FlyAndCrush();
$secondPlane->getBoxForEngineer($engineer);
$engineer->takeBox($secondPlane);
$engineer->decodeBox();