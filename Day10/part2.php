<?php

echo "Start...\n\n\n";

$file = "input.txt";

$input = fopen($file, "r") or die("Unable to open file!");
$raw = fread($input,filesize($file));
fclose($input);

$instructions = explode("\n", $raw);

$x = 1; // sprite position (center of 3 pixels)
$c = 0;

$strength_indices = [20, 60, 100, 140, 180, 220];
$signal_strength = array();

$screen = array_fill( 0, 240, ' ' );
// print_screen();

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

// print_r($signal_strengths);
// echo "Sum of signal strengths is ", array_sum($signal_strengths), "\n";

print_screen();

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

	// draw pixel during cycle
	draw_pixel();

	$x += $delta;
	echo "\tAt the end of cycle $c, the register is $x\n";
}

function draw_pixel()
{
	global $c, $x, $screen;
	$p = ($c - 1) % 40; // $pixels start at 0, cycles start at 1
	echo "\tDrawing in cycle/position $c with register value $x\n";
	if ( ( $p == $x - 1 ) || ( $p == $x ) || ( $p == $x + 1 ) ) {
		// pixel is lit
		$screen[$c-1] = '#';
	}
}


function print_screen() 
{
	global $screen;
	echo "\n";
	for ( $i = 0; $i < 240; $i++ )
	{
		echo $screen[$i];
		if ( $i % 40 == 39 ){
			echo "\n";
		}
	}
	echo "\n";
}


?>