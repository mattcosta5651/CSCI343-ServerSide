<?php
require_once("../../CSCI343-Public/php/Utilities/functions.php");

session_start();
header("Access-Control-Allow-Origin: *");

$cmd = getValue("cmd", "");
if ($cmd == "add")
{
    $response = add();
    header('Content-type: application/json');
    echo json_encode($response);
}
else if ($cmd == "remove")
{
    $response = remove();
    header('Content-type: application/json');
    echo json_encode($response);
}
else if ($cmd == "fetch"){
    $response = fetch();
    header('Content-type: application/json');
    echo json_encode($response);
}
else // list all supported commands
{
  echo
  "
    <pre>
        Command: add
      
            Description: adds a flavor to the list
            
            Parameters: flavor

            Example:
                Query string: ?cmd=add&flavor=chocolate 
                Returns: {'flavors': [chocolate]}
                
        Command: remove
            
            Description: removes a flavor from the list
            
            Parameters: flavor
            
            Example:
                Query string: ?cmd=remove&flavor=chocolate
                Returns: {'flavors': []}
        
        Command: fetch
      
            Description: returns the list of flavors
            
            Parameters: none

            Example:
                Query string: ?cmd=fetch
                Returns: {'flavors': [chocolate]}                
    </pre>            
  ";
}

function add()
{
	$flavors = getSessionValue("flavors", []);
    $flavor = ucwords(strtolower(getValue("flavor", "")));
    
    if(!in_array($flavor,$flavors))
        $flavors[] = $flavor;
	
	setSessionValue("flavors", $flavors);
	
    return array("flavors"=>$flavors);
}

function remove()
{
	$flavors = getSessionValue("flavors", []);
    $flavor = ucwords(strtolower(getValue("flavor", "")));
    
    $newFlavors = [];
    
    $index = -1;
    foreach($flavors as $flav){
        if($flav == $flavor)
            continue;
        else
            $newFlavors[] = $flav;
    }
    
	setSessionValue("flavors", $newFlavors);
	
    return array("flavors"=>$newFlavors);
}


function fetch(){
    $flavors = getSessionValue("flavors", []);
    
    return array("flavors"=>$flavors);
}
?>
