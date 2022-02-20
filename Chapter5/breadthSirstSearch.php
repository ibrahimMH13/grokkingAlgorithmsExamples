<?php

/***
 * 1-A graph models a set of connections,
 */
class Dqueue extends SplQueue
{
}
$queue = [];
function search($rootNode, Dqueue $dQueue)
{
    if ($rootNode->lft != 0) {
        $dQueue->enqueue($rootNode->lft);
    }
    if ($rootNode->rgt != 0) {
        $dQueue->enqueue($rootNode->rgt);
    }
}

$searchQ = new Dqueue();
$id = 2;
echo search($id, $searchQ);
