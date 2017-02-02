<?php
require_once("../../CSCI343-Public/php/Utilities/functions.php");

$checking = getValue("checking", 0);
$savings = getValue("savings", 0);

echo "Checking Account: ".$checking. "<br/>";
echo "Savigns Account: ".$savings. "<br/>";

echo "Service Charge: ".service_charge($checking,$savings);

echo "<br/>";

function service_charge($ck,$sa)
{
    //if ($ck>1500 || $saa>)
    
    
    return ($ck > 1000 || $sa > 1500) ? 0 : 0.15;
}

?>