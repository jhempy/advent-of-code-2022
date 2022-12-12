<?php

echo "Start...\n\n\n";

$file = "test.txt";

$input = fopen($file, "r") or die("Unable to open file!");
$raw = fread($input,filesize($file));
fclose($input);

$lines = explode("\n", $raw);

$head_path = $tail_path = [ [0,0] ];

foreach ($lines as $l)
{
	[ $direction, $spaces ] = explode(" ", $l);
	move_head($direction, $spaces);
}

print_r($tail_path);

$unique_tail_locations = count(
	array_count_values(
		array_map(
			function($value) 
			{
				return "(" . $value[0] . "," . $value[1] . ")";
			},
			$tail_path
		)
	)
);
echo "\n\nTail touched ", $unique_tail_locations, " positions\n"; 



echo "\n\nDone!\n";





// Functions

function move_head($d, $s)
{
	global $head_path, $tail_path;

	echo "\n\nMOVE $d, $s spaces\n";

	for ($m = 0; $m < $s; $m++)
	{

		echo "\n\tInteration $m...\n";

		[ $headx, $heady ] = end($head_path);
		[ $tailx, $taily ] = end($tail_path);

		echo "\tHead starts at (", $headx, ",", $heady, "),";
		echo " tail starts at (", $tailx, ",", $taily, ")\n";

		switch ($d)
		{
			case 'U':
				array_push($head_path, [ $headx, $heady + 1 ]);
				break;
			case 'R':
				array_push($head_path, [ $headx + 1, $heady ]);
				break;
			case 'D':
				array_push($head_path, [ $headx, $heady - 1 ]);
				break;
			case 'L':
				array_push($head_path, [ $headx - 1, $heady ]);
				break;
		}
		move_tail();

		[ $headx, $heady ] = end($head_path);
		[ $tailx, $taily ] = end($tail_path);

		echo "\tHead ends at (", $headx, ",", $heady, "),";
		echo " tail ends at (", $tailx, ",", $taily, ")\n";

	}

}

function move_tail()
{
	global $head_path, $tail_path;

	[ $headx, $heady ] = end($head_path);
	[ $tailx, $taily ] = end($tail_path);

	$xdiff = $headx - $tailx;
	$ydiff = $heady - $taily;

	// If the head is ever two steps directly up, down, left, or right from the tail, 
	// the tail must also move one step in that direction so it remains close enough:

	// .....    .....    .....
	// .TH.. -> .T.H. -> ..TH.
	// .....    .....    .....

	// ...    ...    ...
	// .T.    .T.    ...
	// .H. -> ... -> .T.
	// ...    .H.    .H.
	// ...    ...    ...

	// Otherwise, if the head and tail aren't touching and aren't in the same row or 
	// column, the tail always moves one step diagonally to keep up:

	// .....    .....    .....
	// .....    ..H..    ..H..
	// ..H.. -> ..... -> ..T..
	// .T...    .T...    .....
	// .....    .....    .....

	// .....    .....    .....
	// .....    .....    .....
	// ..H.. -> ...H. -> ..TH.
	// .T...    .T...    .....
	// .....    .....    .....

	// No movement
	if ($xdiff == 0 && $ydiff == 0)
	{
		// No movement, head is on top of tail
		$new = [ $tailx, $taily ];
		array_push($tail_path, $new);
		echo "\tTail stayed put (under head)!\n";		
	}
	
	// No movement
	elseif (abs($xdiff) == 1 && abs($ydiff) == 1)
	{
		// No movement, head is on top of tail
		$new = [ $tailx, $taily ];
		array_push($tail_path, $new);
		echo "\tTail stayed put (touching diagonally)!\n";		
	}

	// No movement
	elseif (abs($xdiff) == 1 && $ydiff == 0)
	{
		// No movement, head is on top of tail
		$new = [ $tailx, $taily ];
		array_push($tail_path, $new);
		echo "\tTail stayed put (touching x-ish)!\n";		
	}

	// No movement
	elseif ($xdiff == 0 && abs($ydiff) == 1)
	{
		// No movement, head is on top of tail
		$new = [ $tailx, $taily ];
		array_push($tail_path, $new);
		echo "\tTail stayed put (touching y-ish)!\n";		
	}

	// Move tail horizontally
	elseif ( abs($xdiff) == 2 && $ydiff == 0 ) 
	{
		$new = [ $tailx + $xdiff/2, $taily ];
		array_push($tail_path, $new);
		echo "\tTail moved horizontally!\n";
	}

	// Move tail vertically
	elseif ( $xdiff == 0 && abs($ydiff) == 2 )
	{
		$new = [ $tailx, $taily + $ydiff/2 ];
		array_push($tail_path, $new);
		echo "\tTail moved vertically!\n";
	}

	// Move tail diagonally
	elseif ( abs($xdiff) == 2 && abs($ydiff) == 1 )
	{
		$new = [ $tailx + $xdiff/2, $taily + $ydiff ];
		array_push($tail_path, $new);
		echo "\tTail moved diagonally (x-ish)!\n";
	}

	// Move tail diagonally
	elseif ( abs($xdiff) == 1 && abs($ydiff) == 2 )
	{
		$new = [ $tailx + $xdiff, $taily + $ydiff/2 ];
		array_push($tail_path, $new);
		echo "\tTail moved diagonally (y-ish)!\n";
	}

	else 
	{
		echo "\tOOOPS...what to do if xdiff is $xdiff and ydiff is $ydiff?!??!!\n";
	}

}





?>