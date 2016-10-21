<?php

function square(&$number){
    $number = $number * $number;
}

$myNumber = 2;
echo "<p>My number is $myNumber</p>"; // 2

square($myNumber);

echo "<p>Now, my number is $myNumber</p>"; // 4
?>