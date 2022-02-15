<?php
/**
 * Recap
• Your computer’s memory is like a giant set of drawers.
• When you want to store multiple elements, use an array or a list.
• With an array, all your elements are stored right next to each other.
• With a list, elements are strewn all over, and one element stores
the address of the next one.
• Arrays allow fast reads.
• Linked lists allow fast inserts and deletes.
• All elements in the array should be the same type (all ints,
all doubles, and so on).
 */
/***
 * @param array $array
 * @return int
 */
function findSmallest(array $array)
{
    $indexSmallItem = 0;
    $smallestItem = $array[0];
    for ($i = 1; $i < count($array); $i++) {
        if ($array[$i] < $smallestItem) {
            $smallestItem = $array[$i];
            $indexSmallItem = $i;
        }
    }
    return $indexSmallItem;
}

/***
 * @param array $array
 * @return array
 */
function selectionSort(array $array){
    $newArr = [];
  while (count($array)){
        $smallLest = findSmallest($array);
        $newArr[] = $array[$smallLest];
        array_splice($array, $smallLest, 1);
     }
    return $newArr;
}
$list = [45,55,12,8,3000,16,68,70,4096];
$position = selectionSort($list);

print_r($position);
