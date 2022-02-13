<?php

//NOTE
/***
1-Binary search only works when your list is in sorted order

 */
function binarySearch($list, $item)
{
    $low = 0;
    $length = count($list);
    $count = 1;
    echo "\t \t \t length of array is #{$length}\n";
    while ($low <= $length) {
        $middlePosition = floor(($low + $length) / 2);
        $guess = $list[$middlePosition];
        echo "\n loop num {$count}# guess position of {$middlePosition} is [$guess]\n";
        if ($guess == $item) {
            echo "\n Great!!, We found it with loop number #{$count} :)\n";
            return $middlePosition;
        }
        if ($guess > $item) {
            echo "\n Opps!!, its small than what we are looking so increase height/length  with one steps :)\n";
            //The guess was too high.
            $length = $middlePosition - 1;
            $count++;
        } else {
            echo "\n Opps!!, its great than what we are looking so decrease low/min with one steps :)\n";
            //The guess was too low.
            $low = $middlePosition + 1;
            $count++;
        }
    }
    return 'none';
}

$listOfItem = [1,2,3,4,5,6,7,8,9,70];

echo binarySearch($listOfItem,5);
