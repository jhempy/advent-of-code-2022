<?php

echo "Start...\n\n\n";

$file = "input.txt";

$input = fopen($file, "r") or die("Unable to open file!");
$raw = fread($input,filesize($file));
fclose($input);

$instructions = explode("\n", $raw);

$x = 1;
$c = 0;

$strength_indices = [20, 60, 100, 140, 180, 220];
$signal_strength = array();

foreach ($instructions as $code)
{
	echo $code, "\n";
	$parts = explode(' ', $code);
	switch ($parts[0]) {
		case 'noop':
			// nothing happens this cycle
			tick(0);
			break;
		case 'addx':
			// calculation occurs at end of next cycle
			tick(0);
			tick($parts[1]);
			break;
	}
}

print_r($signal_strengths);


echo "Sum of signal strengths is ", array_sum($signal_strengths), "\n";

echo "\n\nDone!\n";



// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
// Functions
// ~~~~~~~~~

function tick($delta)
{
	global $c, $x, $strength_indices, $signal_strengths;
	$c++;

	if ( in_array( $c, $strength_indices ) )
	{
		$temp = $c * $x;
		echo "\tDuring cycle $c, signal strength is $temp\n";
		$signal_strengths[$c] = $temp;
	}

	$x += $delta;
	echo "\tAt the end of cycle $c, the register is $x\n";
}




?>