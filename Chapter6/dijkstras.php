<?php
class Dijkstra
{
    protected array $graph;

    public function __construct(array $graph) {
        $this->graph = $graph;
    }

    public function shortestPath($source, $target) {
        // array of best estimates of shortest path to each
        // vertex
        //$d
        $steps = array();
        // array of predecessors for each vertex
        //$pi
        $paths = array();
        // queue of all unoptimized vertices
        $queue = new SplPriorityQueue();

        foreach ($this->graph as $pont => $step) {
            $steps[$pont] = INF; // set initial distance to "infinity"
            $paths[$pont] = null; // no known predecessors yet
            foreach ($step as $weight => $cost) {
                $queue->insert($weight, $cost);
            }
        }

        // initial distance at source is 0
        $steps[$source] = 0;

        while (!$queue->isEmpty()) {
            // extract min cost
            $pont = $queue->extract();
            if (!empty($this->graph[$pont])) {
                // "relax" each adjacent vertex
                foreach ($this->graph[$pont] as $step => $cost) {
                    // alternate route length to adjacent neighbor
                    $alt = $steps[$pont] + $cost;
                    // if alternate route is shorter
                    if ($alt < $steps[$step]) {
                        $steps[$step] = $alt; //here update min cost from start (source) to end (destination)
                        $paths[$step] = $pont;  // add new pont to path (short path)
                        //  for vertex
                    }
                }
            }
        }

        // we can now find the shortest path using reverse
        // iteration
        $stack = new SplStack(); // shortest path with a stack
        $dist = 0;
        // traverse from target to source
        while (isset($paths[$target]) && $paths[$target]) {
            $stack->push($target);
            $dist += $this->graph[$target][$paths[$target]]; // add distance to predecessor
            $target = $paths[$target];
        }

        // stack will be empty if there is no route back
        if ($stack->isEmpty()) {
            echo "No route from $source to $target \n";
        }
        else {
            // add the source node and print the path in reverse
            // (LIFO) order
            $stack->push($source);
            echo "$dist:";
            $sep = '';
            foreach ($stack as $v) {
                echo $sep, $v;
                $sep = '->';
            }
            echo "\n";
        }
    }
}
$graph = array(
    'A' => array('B' => 3, 'D' => 3, 'F' => 6),
    'B' => array('A' => 3, 'D' => 1, 'E' => 3),
    'C' => array('E' => 2, 'F' => 3),
    'D' => array('A' => 3, 'B' => 1, 'E' => 1, 'F' => 2),
    'E' => array('B' => 3, 'C' => 2, 'D' => 1, 'F' => 5),
    'F' => array('A' => 6, 'C' => 3, 'D' => 2, 'E' => 5),
);

$d = new Dijkstra($graph);
$d->shortestPath('D', 'C');  // 3:D->E->C
$d->shortestPath('C', 'A');  // 6:C->E->D->A
$d->shortestPath('B', 'F');  // 3:B->D->F
$d->shortestPath('F', 'A');  // 5:F->D->A
$d->shortestPath('A', 'G');  // No route from A to G
