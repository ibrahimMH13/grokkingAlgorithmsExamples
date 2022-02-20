<?php
/***
 * 1-A graph models a set of connections,
 */
function search(){

    $deque = new \Ds\Deque();
    $deque->insert(0, "e");             // [e]
    $deque->insert(1, "f");             // [e, f]
    $deque->insert(2, "g");             // [e, f, g]
    $deque->insert(0, "a", "b");        // [a, b, e, f, g]
    $deque->insert(2, ...["c", "d"]);   // [a, b, c, d, e, f, g]

    var_dump($deque);

    die(var_dump($deque));
}

search();
