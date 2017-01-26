<?php
	/* 
	This is an example of 
   	a multi line comment 
	*/
	require_once "../../CSCI343-Public/php/Utilities/functions.php";

	$word = getValue("word", "no word specified");
	$word2 = getValue("word2", "Second word not specified");
	$result = $word;
	$length2 = strlen($word2);
	$length = strlen($word);
	$dotLength = 30 - $length - $length2;
	echo "<h3>Enter two words.</h3>";
	
		
	
	for ($count = 0; $count < $dotLength; $count = $count + 1)
	{
		$result = $result.".";
	
	}
	 $result = $result.$word2;
	echo "$result";
	

	// this is a single line comment
?>
