<?php

$indexedArray = array(1,2,3,4);

// pushing values can be done like this
$indexedArray[] = 1;

// or this...
$indexedArray[1] = 2;

var_dump($indexedArray);

echo "<br />";

$associativeArray =
    array("apples"=>"1","bananas"=>4);

$associativeArray["apples"] = 1;
$associativeArray["bananas"] = 4;

var_dump($associativeArray);
