<?php
    require_once("../../CSCI343-Public/php/Utilities/functions.php");

    $tires[0] = array(getValue("frontLeft", 0), "Front Left");
    $tires[1] = array(getValue("frontRight", 0), "Front Right");
    $tires[2] = array(getValue("backLeft", 0), "Back Left");
    $tires[3] = array(getValue("backRight", 0), "Back Right");

    foreach($tires as $tire)
        echo $tire[1].": ".$tire[0]."<br/>";


    check_pressure($tires[0], $tires[1]);
    check_pressure($tires[2], $tires[3]);
    
    function check_pressure($tire1, $tire2){
        echo "<br/>";
        check_indv_pressure($tire1);
        check_indv_pressure($tire2);
        
        
        if($tire1[0] == $tire2[0])
            echo "Tires match! <br/>";
        else
            echo "Tires don't match! <br/>";
            
        echo "<br/>";
    }
    
    function check_indv_pressure($tire){
        if($tire[0] > 35 && $tire[0] < 45)
            echo $tire[1]." is checked!"."<br/>";
        else
            echo $tire[1]." has bad pressure!"."<br/>";
    }
    
 
?>