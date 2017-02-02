<?php
	/* 
	This is an example of 
   	a multi line comment 
	*/
	require_once "../../CSCI343-Public/php/Utilities/functions.php";

	echo "<h3>Enter a character name.</h3>";
	echo "<h3>Enter the character's strength from 1-10.</h3>";
	echo "<h3>Enter the character's health from 1-10.</h3>";
	echo "<h3>Enter the character's luck from 1-10.</h3>";
	echo "<h3>The total of the attributes should not exceed 15.</h3>";

	$name = getValue("name", "no name specified");
	$strength = getValue("strength", "no strength specified");
	$health = getValue("health", "no health specified");
	$luck = getValue("luck", "no luck specified");
	
	$total = $strength + $health + $luck;
	if($total > 15)
	{
		echo "the total attributes cannot exceed 15";
		$strength = 5;
		$health = 5;
		$luck = 5;
	}
	
	echo "name: $name <br>";
	echo "strength: $strength<br>";
	echo "health: $health<br>";
	echo "luck: $luck<br>";
	
	// this is a single line comment
?>
