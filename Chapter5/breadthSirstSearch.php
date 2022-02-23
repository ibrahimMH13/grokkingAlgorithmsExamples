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
-BFS run vertical not horizontal so
*/
//List as array
$graph = array(
    'A' => array('B', 'F'),
    'B' => array('A', 'D', 'E','F'),
    'C' => array('E'),
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
        echo "\t\t\t [BFS STEPS]\n1#make instance from Spl Queue (FIFO)\n";
        $queue = new SplQueue();
        echo "2#add from (origin) to queue\n";
        $queue->enqueue($from);
        echo "3#push element into visited array to marked it passed\n";
        array_push($this->visited,$from);
        echo "4# array buket for paths\n";
        $path = [];
        echo "4# make step as index and push into  it SqlLinked list\n";
        $path[$from] = new SplDoublyLinkedList();
        echo "5# change SqlLinked list mode to FIFO ( as queue- First Input First Output)\n";
        $path[$from]->setIteratorMode(SplDoublyLinkedList::IT_MODE_FIFO|SplDoublyLinkedList::IT_MODE_KEEP);
        echo "6# push itself to into its SqlLinked\n";
        $path[$from]->push($from);
        echo "7#in loop check if queue is not empty & last queue not destinations[to]\n";
        $count = 1;
        while (!$queue->isEmpty() && $queue->bottom() != $to){
            echo "=>\t8/$count#get element from queue\n";
            $point = $queue->dequeue();
            echo "=>\t9/$count# check is exits or not empty point\n";
            if (!empty($this->graphListArray[$point])){
                echo "=>\t10/$count# loop into point for all neighbors or direct point\n";
                foreach ($this->graphListArray[$point] as $step){
                    echo "=>\t11/$count# check if not visited before\n";
                    if (!in_array($step,$this->visited)){
                        echo "=>\t12/$count# add neighbors | direct point | step into queue\n";
                        $queue->enqueue($step);
                        echo "=>\t13/$count# add step as visited \n";
                        $this->visited[] = $step;
                        echo "=>\t14/$count# add step into path with\n";
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
$q->breadthFirstSearch('D','C');


