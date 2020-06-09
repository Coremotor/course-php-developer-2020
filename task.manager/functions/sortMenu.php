<?php

function arraySort($arr, $sort)
{
    usort($arr, function ($a, $b) use ($sort) {
        return $sort == 'desc' ? $b['sort'] - $a['sort'] : $a['sort'] - $b['sort'];
    });

    return $arr;
}

