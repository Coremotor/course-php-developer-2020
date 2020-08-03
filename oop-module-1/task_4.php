<?php

namespace task_4;

class User
{

    function __construct($fio, $email, $gender = '', $age = '', $phone = '')
    {
        $this->fio = $fio;
        $this->email = $email;
        $this->gender = $gender;
        $this->age = $age;
        $this->phone = $phone;
    }

    protected function notifyOnEmail($message, $receiver, $via, $to)
    {
        $notification = new Notification($receiver, $via, $to);
        $notification->send($this->fio, $this->age, $via, $this->email, $message);
    }

    protected function notifyOnPhone($message, $receiver, $via, $to)
    {
        $notification = new Notification($receiver, $via, $to);
        $notification->send($this->fio, $this->age, $via, $this->phone, $message);
    }

    public function notify($message)
    {
        if ($this->censor()) {
            if ($this->email) {
                $this->notifyOnEmail($message, $this->fio, 'почта', $this->email);
            }

            if ($this->phone) {
                $this->notifyOnPhone($message, $this->fio, 'телефон', $this->phone);
            }
        }
    }

    protected function censor()
    {
        if ($this->age < 18) {
            echo "Возраст пользователя должен быть больше 18 лет!<br />";
        } else {
            return true;
        }
    }
}

class Notification
{
    public $receiver;
    public $via;
    public $to;

    public function __construct($receiver, $via, $to)
    {
        $this->receiver = $receiver;
        $this->via = $via;
        $this->to = $to;
    }

    public function send($fio, $age, $via, $destination, $message)
    {
        echo "Уведомление клиенту: $fio возраст: $age лет канал связи $via: $destination: $message <br />";
    }
}

$userFull = new User('Иванов Иван Иваныч', 'qwe@ll.ru', 'м', 25, '89992220011');
$userFull->notify('Hello');

$userEmail = new User('Петров Петр Петрович', 'qwe@ll.ru', 'м', 25);
$userEmail->notify('Hello');

$userYoung = new User('Соколов Сокол Соколович', 'qwe@ll.ru', 'м', 16, '89992220011');
$userYoung->notify('Hello');