<?php

echo "Start...\n";

$file = "input.txt";

$input = fopen($file, "r") or die("Unable to open file!");
$raw = fread($input,filesize($file));
fclose($input);

$lines = explode("\n", $raw);

$lefties = array();
$righties = array();

foreach ($lines as $line) 
{
	$a = explode(',', $line); // assignments

	$e1 = explode('-', $a[0]);
	$e2 = explode('-', $a[1]);

	if ($e1[0] < $e2[0]) 
	{
		// $e2 might be inside $e1
		if ($e1[1] >= $e2[1])
		{
			$righties[] = $line;
		}

	}
	elseif ($e1[0] > $e2[0]) 
	{
		// $e1 might be inside $e2
		if ($e1[1] <= $e2[1])
		{
			$lefties[] = $line;
		}

	}
	else 
	{
		// containment! but it could go either way
		if ($e1[1] <= $e2[1])
		{
			$righties[] = $line;
		}
		else {
			$lefties[] = $line;
		}


	}






}


print_r($lefties);

print_r($righties);


$all = array_merge($lefties, $righties);

echo count($all);



echo "\n\nDone!\n";





?>