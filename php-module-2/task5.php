<pre>
<?php

$city1 = rand(0 ,1000);
$city1Radius = 50 ;
$city2 = rand(0 ,1000) ;
$city2Radius = 80 ;

$city1Start = $city1 - $city1Radius;
$city1End = $city1 + $city1Radius;
$city2Start = $city2 - $city2Radius;
$city2End = $city2 + $city2Radius;


for ($i = 1; $i < 11; $i++) {

    $car = rand(0, 1000);

    if (($car >= $city1Start && $car <= $city1End) || ($car >= $city2Start && $car <= $city2End)) {
        echo "Машина {$i} едет по городу, на {$car} км не более 70 <br>";
    } else {
        echo "Машина {$i} едет по шоссе.<br>";
    }
}
?>
</pre>
