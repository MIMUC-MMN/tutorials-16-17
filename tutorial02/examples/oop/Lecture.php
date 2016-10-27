<?php
class Lecture{
    var $title = "Online Multimedia";
    var $semester = "winter 2015/2016";
    var $professor = "Prof. Dr. Heinrich Hussmann";
    var $date = "Thursdays 10-13h";

    function __construct($ttl, $sms, $prf, $dt){
        $this->title= $ttl;
        $this->semester = $sms;
        $this->professor = $prf;
        $this->date = $dt;
    }

    function setDate($date){
        $this->date = $date;
    }

    function getDate(){
        return $this->date;
    }
}
?>
