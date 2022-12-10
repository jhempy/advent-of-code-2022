<?php

echo "Start...\n";

$file = "input.txt";

$input = fopen($file, "r") or die("Unable to open file!");
$raw = fread($input,filesize($file));
fclose($input);


echo strlen($raw), "\n";

echo $raw, "\n";

$match = false;
$i = 0;

while (!$match) 
{

	$temp = array_count_values(str_split(substr($raw, $i, 14)));

	if (count($temp) == 14)
	{
		$match = true;
	}
	else 
	{
		$i++;
	}
}


echo $i+14, "\n";



echo "\n\nDone!\n";


function parse_instruction($i)
{
	$stuff = explode(' ', $i);
	return [$stuff[1], $stuff[3], $stuff[5]];
}


?>