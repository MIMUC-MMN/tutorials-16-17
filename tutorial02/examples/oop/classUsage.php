<?php
require_once("Lecture.php");
$mmn = new Lecture();
var_dump($mmn);

echo 'Title: '.$mmn->title;
echo 'Semester: '.$mmn->semester;
echo 'Professor: '.$mmn->professor;

$mmn->setDate("Thursday morning");
echo $mmn->getDate();

$mmi = new Lecture("MMI",
    "Winter semester","Prof. Butz","Wendesdays");
?>
