<?php
/***        Note
 * 1-There’s no performance benefit to using recursion; in fact, loops are
 *   sometimes better for performance.
 *          Recap
• Recursion is when a function calls itself.
• Every recursive function has two cases: the base case
    and the recursive case.
• A stack has two operations: push and pop.
• All function calls go onto the call stack.
• The call stack can get very large, which takes up a lot of memory.
 */



function countDown(int $number){
    echo "==>$number\n";//this is base code part 1
    if ($number>0)  countDown($number-1); //this is recursive code part 2
}

function factorial(int $number)
{

    if ($number == 1)
        return $number;
    else
        return   $number * factorial($number - 1);
}
/***/
countDown(5);
echo "<==========# fact #=========>\n";
echo factorial(4);
