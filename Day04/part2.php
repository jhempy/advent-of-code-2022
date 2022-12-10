<?php

echo "Start...\n";

$file = "input.txt";

$input = fopen($file, "r") or die("Unable to open file!");
$raw = fread($input,filesize($file));
fclose($input);

$lines = explode("\n", $raw);

$any = array();

foreach ($lines as $line) 
{
	$a = explode(',', $line); // assignments

	$t1 = explode('-', $a[0]);
	$r1 = range($t1[0], $t1[1]);

	$t2 = explode('-', $a[1]);
	$r2 = range($t2[0], $t2[1]);

	$o = array_intersect($r1, $r2);

	if (count($o)) {
		$any[] = $line;
	}




}


echo count($any);



echo "\n\nDone!\n";





?>