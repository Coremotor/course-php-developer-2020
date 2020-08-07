<?php

class Box
{
    public function putBall(Ball $ball)
    {
        Ball::$count += 1;
    }
}

class Ball {
    public static $count = 0;
}

$box = new Box;

for ($i = 0; $i < rand(1, 100); $i++) {
    $box->putBall(new Ball);
}

echo(Ball::$count);