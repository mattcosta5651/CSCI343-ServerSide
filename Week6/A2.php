<?php
    require_once("../../CSCI343-Public/php/Utilities/functions.php");

    $cmd = getValue("cmd", "");
    $weight = getValue("w", 0);
    $height = getValue("h", 0);
    
    if($cmd == "bmi"){
        $response =  bmi($weight, $height); 
        header('Content-type: application/json');
        echo json_encode($response);
    }
        
    else {
        echo
        "
        <pre>
            Command: bmi
      
            Description: calculates body mass index (BMI)
            
            Parameters: 
                w = weight in lbs (default 0)
                h = height in inches (default 0)

            Example:
                Query string: ?cmd=bmi&w=160&h=72
                Returns: {'w':72,'h':1.8,'bmi':22.222222222222,'status':'healty'}     
        </pre>
        ";
    }
    
    function bmi($weight, $height){
       #protect divide by 0
       if($height == 0)
            return "Height cannot be 0";
       
        #conversion factors
        $weight = $weight * 0.45;
        $height = $height * 0.025;
        
        #calculates bmi
        $bmi = $weight/($height*$height);
        
        #checks status
        $status = "";
        if($bmi <=25 || $bmi >=19)
            $status = "healthy";
        else 
            $status = "unhealthy";
            
        #returns array
        return array("w"=>$weight, "h"=>$height, "bmi"=>$bmi, "status"=>$status);
    }
?>