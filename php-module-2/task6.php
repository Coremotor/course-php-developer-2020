<?php

$studentsCount = rand(1, 100000);
$num = 0;

if ($studentsCount > 19) {
    $num = intval(substr($studentsCount, -2));
}

if ($num > 19) {
    $num = intval(substr($num, -1));
} elseif ($num >= 5 && $num <= 19) {
    $suffix = 'ов';
} else {
    $num = $studentsCount;
}

//switch ($num) {
//    case 1:
//        $suffix = '';
//        break;
//    case 2:
//    case 3:
//    case 4:
//        $suffix = 'а';
//        break;
//    default:
//        $suffix = 'ов';
//        break;
//}

if ($num === 1) {
    $suffix = '';
} elseif ($num === 2 || $num === 3 || $num === 4) {
    $suffix = 'а';
} else {
    $suffix = 'ов';
}


echo "На учебе {$studentsCount} студент{$suffix}";

