<?php

echo "Start...\n";

$file = "input.txt";

$input = fopen($file, "r") or die("Unable to open file!");
$raw = fread($input,filesize($file));
fclose($input);

$elves = explode("\n\n", $raw);

$max_calories = 0;

foreach ($elves as $elf => $snack_list) 
{
	$snacks = explode("\n", $snack_list);
	$calories = array_sum($snacks);
	if ($max_calories < $calories) 
	{
		$max_calories = $calories;
	}

}

echo $max_calories;

echo "\n\nDone!\n"


?>