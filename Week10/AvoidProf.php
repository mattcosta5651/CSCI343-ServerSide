<?php
    require_once("../../CSCI343-Public/php/Utilities/functions.php");
    require_once 'dblogin.php';

    session_start();
    header("Access-Control-Allow-Origin: *");
    
    $conn = new mysqli($db_hostname, $db_username, $db_password, $db_database);    
    
    $cmd = getValue("cmd", "");
    
    if($cmd == "avoid"){
        $name = getValue("name", 0);
        $response = avoid($name, $conn);  
        echo json_encode($response);
    }
    else{
        echo
        "
            <pre>
                Command: avoid
                    Description: Lists classes professor teaches
                    
                    Param: last name of professor
                    
                    Ex: 
                        Query: ?cmd=avoid&name=Cohen
                        Returns {'Name': 'Cohen', 'Classes': list}
            </pre>
        ";
    }
    
    function avoid($name, $conn){
        $result = $conn->query("SELECT * FROM ProfClass WHERE professor ='".$name."'");
        $rows = array();
        while($r = mysqli_fetch_assoc($result)){
            $rows[] = $r;
        }
        
        return array("Name"=> $name, "Rows"=> $rows);
    }
    
?>