<!DOCTYPE html>
<html>
<head lang="en">
  <meta charset="UTF-8">
  <title>Comparison</title>
</head>
<body>

<?php
$intZero = 0;
$stringZero = "0";

if($intZero == $stringZero)
        echo "== Equal";
else    echo "== unequal";

echo "<br />";

if($intZero === $stringZero)
        echo "=== identical!";
else    echo "=== unidentical!";

echo "<br />";

if($intZero <> $stringZero)
        echo "<> unequal";
else    echo "<> equal";

echo "<br />";

echo $intZero !== $stringZero ? "!== still not identical" : "!== yes, identical";

// remark: no curly braces were used for the statements to save space on the slides.
// you should use those braces consistently.
?>

</body>
</html>