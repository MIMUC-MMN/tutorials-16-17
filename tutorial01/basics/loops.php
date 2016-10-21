<?php

$isHomerHungry = true;
while($isHomerHungry){
    echo 'Homer is still hungry.&nbsp;';
    $isHomerHungry = (rand(0,10) != 10);
}
echo "<p>Homer is not hungry anymore</p>";

for($donut=1;$donut<=10;$donut++){
    echo "Homer is eating donut $donut. ";
}

$donuts = array(
    "sprinkled",
    "maple",
    "glazed");

echo "<p>";
foreach($donuts as $donut){
    echo "Homer likes $donut donuts. ";
}
echo "</p>";

?>