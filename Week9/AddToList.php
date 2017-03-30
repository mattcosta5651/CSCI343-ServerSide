<?php
    require_once("../../CSCI343-Public/php/Utilities/functions.php");

    session_start();
    
    header("Access-Control-Allow-Origin: *");
    
    $cmd = getValue("cmd", "");
    
    if($cmd == "add"){
        $num = getValue("num", 0);
        $response = add($num);  
        echo json_encode($response);
    }
    else{
        echo
        "
            <pre>
                Command: add
                    Description: add number to list
                    
                    Param: num
                    
                    Ex: 
                        Query: ?cmd=add&num=0
                        Returns {'numbers': list, 'largest': largest}
            </pre>
        ";
    }
    
    function add($num, $list){
        $numbers = getSessionValue("numbers", []);
        $numbers[] = $num;
        setSessionValue("numbers", $numbers);
        $largest = largest($list);
        
        return array("numbers"=> $numbers, "largest"=> $largest);
    }
    
    function largest(){
        $max = 0;
        foreach($list as $num){
            if($num > $max)
                $max = $num;
        }
        
        return $max;
            
    }
?>