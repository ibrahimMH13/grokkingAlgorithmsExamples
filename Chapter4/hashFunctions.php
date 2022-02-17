<?php
/*
In PHP, associative arrays are implemented as hashtables, with a bit of extra functionality.

However technically speaking, an associative array is not identical to a hashtable - it's simply implemented in part with a hashtable behind the scenes. Because most of its implementation is a hashtable, it can do everything a hashtable can - but it can do more, too.

For example, you can loop through an associative array using a for loop, which you can't do with a hashtable.

So while they're similar, an associative array can actually do a superset of what a hashtable can do - so they're not exactly the same thing. Think of it as hashtables plus extra functionality.

Code examples:

Using an associative array as a hashtable:
*/
$favoriteColor = array();
$favoriteColor['bob']='blue';
$favoriteColor['Peter']='red';
$favoriteColor['Sally']='pink';
echo 'bob likes: '.$favoriteColor['bob']."\n";
echo 'Sally likes: '.$favoriteColor['Sally']."\n";
//output: bob likes blue
//        Sally likes pink
//Looping through an associative array:

$idTable=array();
$idTable['Tyler']=1;
$idTable['Bill']=20;
$idTable['Marc']=4;
//up until here, we're using the array as a hashtable.

//now we loop through the array - you can't do this with a hashtable:
foreach($idTable as $person=>$id)
    echo 'id: '.$id.' | person: '.$person."\n";

//output: id: 1 | person: Tyler
//        id: 20 | person: Bill
//        id: 4 | person: Marc

//https://medium.com/openmindonline/js-monday-11-the-hashtable-data-structure-45ce22ad4da6
