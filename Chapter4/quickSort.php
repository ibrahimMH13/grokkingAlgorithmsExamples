<?php

//Average case vs. worst case
//The performance of quicksort heavily depends on the pivot you choose.
//Suppose you always choose the first element as the pivot. And you
//call quicksort with an array that is already sorted. Quicksort doesn’t
//check to see whether the input array is already sorted. So it will still try
//to sort it.
/***+
                Recap
• D&C works by breaking a problem down into smaller and smaller
pieces. If you’re using D&C on a list, the base case is probably an
empty array or an array with one element.
• If you’re implementing quicksort, choose a random element as the
pivot. The average runtime of quicksort is O(n log n)!
• The constant in Big O notation can matter sometimes. That’s why
quicksort is faster than merge sort.
• The constant almost never matters for simple search versus binary
search, because O(log n) is so much faster than O(n) when your list
gets big. */
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
