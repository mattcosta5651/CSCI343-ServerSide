<?php
    require_once("../../CSCI343-Public/php/Utilities/functions.php");

    session_start();
    header("Access-Control-Allow-Origin: *");
    
    $cmd = getValue("cmd", "");
    if($cmd == "howMuchGas"){
        $mpg = getValue("mpg", 0);
        $tankSize = getValue("tankSize", 0);
        $gasCost = getValue("gasCost", 0);
        $tripDist = getValue("tripDist", 0);
        
        $response = calcGas($mpg, $tankSize, $gasCost, $tripDist);
        header('Content-type: application/json');
        echo json_encode($response);
    }
    else{
        echo
        "
            <pre>
                Command: howMuchGas
                
                    Description: 
                        Returns number of tanks you must fill up on a trip 
                        and the cost to do so.  NOTE: this assumes that when 
                        you add gas to your tank you always fill it up.
                    
                    Parameters: 
                            mpg - miles per gallon of your vehicle
                            tankSize - how many gallons your tank holds
                            cost = the cost of a gallon of gas
                            distance = how many miles you will be traveling
                            
                            NOTE: An error should be printed if any of these
                            paraeters is less than or equal to 0 or  not a valid number.
                
                    Example:
                        Query string: ?cmd=howMuchGas&mpg=1&tankSize=2&cost=10&distance=5
                        Returns:  
                            {'error':'','tanksFills':3,'totalCost':60}            
            </pre>
        
        ";
    }
    
    function calcGas($mpg, $tankSize, $gasCost, $tripDist)
    {
        $error = "";
                    
        $tanksFills = 0;
        $totalCost = 0;
        
        $error = checkForError($mpg, "mpg");
        $error = checkForError($tankSize, "tank size");
        $error = checkForError($gasCost, "cost of gas");
        $error = checkForError($tripDist, "trip distance");
        
            
        if($error == ""){
            $gallons = $tripDist/$mpg;
            
            $tanksFills = ceil($gallons/$tankSize);
            $totalCost = $tanksFills*$gasCost;
        }

        
        return array("error"=>$error, "tanksFills"=>$tanksFills, "totalCost"=>$totalCost);
    }
    
    function checkForError($val, $name){
        if(!is_numeric($val))
            return "You must enter a valid number in field ".$name;
        elseif($val <= 0)
            return "Input for field ".$name." must be positive";
        else 
            return "";
    }
?>