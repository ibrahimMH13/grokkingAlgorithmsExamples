<?php

function quickSort(array $array)
{
    if (count($array) < 2)
        return $array;
    else {
        $pivot = array_shift($array);
        $smallest = [];
        $greater = [];
        foreach ($array as $item) {
            $pivot > $item ? $smallest[] = $item : $greater[] = $item;
        }
        return array_merge(quickSort($smallest), [$pivot], quickSort($greater));
    }
}

print_r(quickSort([30,45,5,79,0,100,8,2,4]));
