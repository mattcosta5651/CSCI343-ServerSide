<?php
    require_once("../CSCI343-Public/php/Utilities/functions.php");
    
    $cmd = getValue("cmd", "");
    $num = array();
    $num = getValue("num", "");
    if($cmd == "add"){
        $response = add($num);
        header('Content-type: application/json');
        echo json_encode($response);
    }
    
    elseif($cmd == "sub"){
        $response = sub($num);
        header('Content-type: application/json');
        echo json_encode($response);
    }
    elseif($cmd == "mult") {
        $response = mult($num);
        header('Content-type: application/json');
        echo json_encode($response);
    }
    else{
      echo
      "
        <pre>
            Command: add
          
                Description: adds numbers in an array
                
                Parameters: array of numbers
    
                Example: 
                    Query string: cmd=add&num[]=4&num[]=2&num[]=1
                    Returns: sum of numbers
    
            Command: 
          
                Description: subtracts numbers in an array
                
                Parameters: array of numbers
    
                Example:
                    Query string: cmd=sub&num[]=4&num[]=2&num[]=1
                    Returns: difference of numbers
            Command: mult
                
                Description: multiplies numbers in an array
                
                Parameters: array of numbers
                
                Example:
                    Query string: cmd=mult&num[]=4&num[]=2&num[]=1
                    Returns: product of numbers
    
        </pre>            
      ";        
    }
    function add($num){
        $sum = 0;
        foreach($num as $number){
            $sum = $sum + $number;
        }
        return array("Sum"=>$sum);
    }
    
    function sub($num){
        $difference = $num[0];
        for($i = 1; $i < count($num); $i = $i + 1){
            $difference = $difference - $num[$i];
        }
        return array("Difference"=>$difference);
    }
    
    function mult($num){
        $product = 1;
        foreach ($num as $number) {
            $product = $product*$number;
        }
        return array("Product"=>$product);
    }
?>