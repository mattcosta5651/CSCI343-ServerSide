<?php
    require_once("../../CSCI343-Public/php/Utilities/functions.php");

    $low = getValue("low", 0); 
    $high = getValue("high", 0);

    $total = 0;
    
    for($i = $low; $i < $high; $i++){
        $total = $total + $i;
    }
    
    echo $total;    

?>