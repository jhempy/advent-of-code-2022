<?php

echo "Start...\n";

$file = "input.txt";

$input = fopen($file, "r") or die("Unable to open file!");
$raw = fread($input,filesize($file));
fclose($input);

$elves = explode("\n\n", $raw);

$calories = array();

foreach ($elves as $elf => $snack_list) 
{
	$snacks = explode("\n", $snack_list);
	$calories[$elf] = array_sum($snacks);
}

rsort($calories);

$snackmaster_total = array_sum(array_slice($calories, 0, 3));

echo $snackmaster_total;

echo "\n\nDone!\n"

?>