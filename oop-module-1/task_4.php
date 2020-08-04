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

    protected function notifyOnEmail($message)
    {
        $notification = new Notification($this->fio, 'почта', $this->email);
        $notification->send($message);
    }

    protected function notifyOnPhone($message)
    {
        $notification = new Notification($this->fio, 'телефон', $this->phone);
        $notification->send($message);
    }

    public function notify($message)
    {
        if ($this->censor()) {
            if ($this->email) {
                $this->notifyOnEmail($message);
            }

            if ($this->phone) {
                $this->notifyOnPhone($message);
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

    public function send($message)
    {
        echo "Уведомление клиенту: $this->receiver канал связи $this->via: $this->to: $message <br />";
    }
}

$userFull = new User('Иванов Иван Иваныч', 'qwe@ll.ru', 'м', 25, '89992220011');
$userFull->notify('Hello');

$userEmail = new User('Петров Петр Петрович', 'qwe@ll.ru', 'м', 25);
$userEmail->notify('Hello');

$userYoung = new User('Соколов Сокол Соколович', 'qwe@ll.ru', 'м', 16, '89992220011');
$userYoung->notify('Hello');