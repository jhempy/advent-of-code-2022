<?php

echo "Start...\n";

$file = "input.txt";

$input = fopen($file, "r") or die("Unable to open file!");
$raw = fread($input,filesize($file));
fclose($input);

$section = explode("\n\n", $raw);

$stacks = array();
if ($file == 'test.txt') 
{
	$stacks = 
	[
		['Z', 'N'],
		['M', 'C', 'D'],
		['P']
	];
}
elseif ($file == 'input.txt')
{
	$stacks = 
	[
		['W', 'B', 'D', 'N', 'C', 'F', 'J'],
		['P', 'Z', 'V', 'Q', 'L', 'S', 'T'],
		['P', 'Z', 'B', 'G', 'J', 'T'],
		['D', 'T', 'L', 'J', 'Z', 'B', 'H', 'C'],
		['G', 'V', 'B', 'J', 'S'],
		['P', 'S', 'Q'],
		['B', 'V', 'D', 'F', 'L', 'M', 'P', 'N'],
		['P', 'S', 'M', 'F', 'B', 'D', 'L', 'R'],
		['V', 'D', 'T', 'R']
	];
}

$instructions = explode("\n", $section[1]);

foreach ($instructions as $i)
{
	[$count, $from, $to] = parse_instruction($i);

	$from_index = $from - 1;
	$to_index = $to -1;

	for ($x=0; $x<$count; $x++)
	{
		$stacks[$to_index][] = array_pop($stacks[$from_index]);
	}



}



print_r($stacks);


$code = '';


foreach ($stacks as $s)
{
	$code .= array_pop($s);
}



echo $code, "\n";



echo "\n\nDone!\n";


function parse_instruction($i)
{
	$stuff = explode(' ', $i);
	return [$stuff[1], $stuff[3], $stuff[5]];
}


?>