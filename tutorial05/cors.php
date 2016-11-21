<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

// you can imagine that this could be fetched from a database:
$data = array();
$data['albums'] = array();
$data['albums'][] = array("name"=>"Gemstones","artist"=>"Adam Green");
$data['albums'][] = array("name"=>"Such Hot Blood", "artist"=>"The Airborne Toxic Event");
$data['albums'][] = array("name"=>"B-Grade University", "artist"=>"Alex Lahey");
$data['albums'][] = array("name"=>"Triebwerke", "artist"=>"Alligatoah");
$data['albums'][] = array("name"=>"Anysome", "artist"=>"Aloa Input");
//...

// now generate the output
echo json_encode($data);