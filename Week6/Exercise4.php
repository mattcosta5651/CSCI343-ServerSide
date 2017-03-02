<?php
    require_once("../../CSCI343-Public/php/Utilities/functions.php");

    session_start();
    header("Access-Control-Allow-Origin: *");
    
    $wallsFt = getValue("wallsFt", 0);
    $cansFt = getValue("cansFt", 0);
    $cansCost = getValue("cansCost", 0);
    
    
    echo json_encode(calcCost($wallsFt, $cansFt, $cansCost));
    
    
    function calcCost($wallsFt, $cansFt, $cansCost)
    {
        $error = "none";
     
        if(!is_numeric($wallsFt) || !is_numeric($cansFt))
            $error = "Square footage must be a number";
        elseif(!is_numeric($cansCost))
            $error = "Cost of can must be a number";
        elseif($wallsFt <= 0 || $cansFt <= 0 || $cansCost <= 0)
            $error = "Input must be a positive number";
      
            
        if($error == "none"){
            $cans = ceil($wallsFt/$cansFt);
            $cost = $cans*$cansCost;
        }
        else{
            $cans = 0;
            $cost = 0;
        }
            
        
        return array("error"=>$error, "cans"=>$cans, "cost"=>$cost);
    }
?>