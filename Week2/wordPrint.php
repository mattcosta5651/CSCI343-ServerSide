<?php
	/* 
	This is an example of 
   	a multi line comment 
	*/
	require_once "../../CSCI343-Public/php/Utilities/functions.php";

	$word = getValue("word", "no word specified");
	$length = strlen($word);
	echo "<h3>Enter a word.</h3>";

	for ($count = 0; $count < $length; $count = $count + 1)
	{
		echo "<p>$word</p>";
	
	}

	// this is a single line comment
?>
