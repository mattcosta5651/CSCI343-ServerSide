<?php

    require_once("../../CSCI343-Public/php/Utilities/functions.php");
    
    $grades[0] = getValue("grade1", "0");
    $grades[1] = getValue("grade2", "0");
    $grades[2] = getValue("grade3", "0");
    $grades[3] = getValue("grade4", "0");
    $grades[4] = getValue("grade5", "0");

    $total = 0;
    $max = 0;
    foreach($grades as $grade){
        $total = $total+$grade;
        if($grade > $max)
            $max = $grade;
    }
    
    echo "<p> Ave: ".($total/5).", "."Max: ".$max."</p>";

?>