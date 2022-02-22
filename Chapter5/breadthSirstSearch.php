<?php

/***
 * 1- A graph models a set of connections,
 * 2- Representing the Graph There are generally two ways to represent a graph
 *  A-  List
 *  B-  Matrix
 */
/*
Recap
• Breadth-first search tells you if there’s a path from A to B.
• If there’s a path, breadth-first search will find the shortest path.
• If you have a problem like “find the shortest X,” try modeling your
problem as a graph, and use breadth-first search to solve.
• A directed graph has arrows, and the relationship follows the
direction of the arrow (rama -> adit means “rama owes adit money”).
• Undirected graphs don’t have arrows, and the relationship goes both
ways (ross - rachel means “ross dated rachel and rachel dated ross”).
• Queues are FIFO (First In, First Out).
• Stacks are LIFO (Last In, First Out).
• You need to check people in the order they were added to the search
list, so the search list needs to be a queue. Otherwise, you won’t get
the shortest path.
• Once you check someone, make sure you don’t check them again.
Otherwise, you might end up in an infinite loop.

*/
//List as array
$graph = array(
    'A' => array('B', 'F'),
    'B' => array('A', 'D', 'E','F'),
    'C' => array('F'),
    'D' => array('B', 'E'),
    'E' => array('B', 'D', 'F'),
    'F' => array('A', 'E', 'C'),
);

class Graph
{

    private array $graphListArray;
    protected array $visited = [];

    public function __construct(array $graphListArray)
    {
        $this->graphListArray = $graphListArray;
    }
    /**
     * $from origin
     * $to destination
     */
    public function breadthFirstSearch($from,$to){
        $queue = new SplQueue();
        $queue->enqueue($from);
        array_push($this->visited,$from);
        $path = [];
        $path[$from] = new SplDoublyLinkedList();
        $path[$from]->setIteratorMode(SplDoublyLinkedList::IT_MODE_FIFO|SplDoublyLinkedList::IT_MODE_KEEP);
        $path[$from]->push($from);
        while (!$queue->isEmpty() && $queue->bottom() != $to){
            $point = $queue->dequeue();
            if (!empty($this->graphListArray[$point])){
                foreach ($this->graphListArray[$point] as $step){
                    if (!in_array($step,$this->visited)){
                        $queue->enqueue($step);
                        array_push($this->visited,$step);
                        $path[$step] = clone $path[$point];
                        $path[$step]->push($step);
                    }
                }
            }
        }
        if (isset($path[$to])) {
            echo "$from to $to in ",
                count($path[$to]) - 1,
            " STEPS ";
            $sep = '';
            foreach ($path[$to] as $vertex) {
                echo $sep, $vertex;
                $sep = '->';
            }
            echo "\n";
        }
        else {
            echo "No route from $from to $to";
        }
    }
}

$q = new Graph($graph);
$q->breadthFirstSearch('A','F');


