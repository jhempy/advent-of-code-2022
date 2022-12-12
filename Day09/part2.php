<?php

echo "Start...\n\n\n";

$file = "input.txt";

$input = fopen($file, "r") or die("Unable to open file!");
$raw = fread($input,filesize($file));
fclose($input);

$lines = explode("\n", $raw);

$knots = [ 
	[ [0,0] ], 
	[ [0,0] ], 
	[ [0,0] ], 
	[ [0,0] ], 
	[ [0,0] ], 
	[ [0,0] ], 
	[ [0,0] ], 
	[ [0,0] ], 
	[ [0,0] ], 
	[ [0,0] ]
];

foreach ($lines as $l)
{
	[ $direction, $spaces ] = explode(" ", $l);
	move_head($direction, $spaces);
}

echo "\n\n";

$unique_tail_locations = count(
	array_count_values(
		array_map(
			function($value) 
			{
				return "(" . $value[0] . "," . $value[1] . ")";
			},
			$knots[9]
		)
	)
);
echo "\n\nTail touched ", $unique_tail_locations, " positions\n"; 

status();

echo "\n\nDone!\n";




// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
//
// Functions
// ~~~~~~~~~
//

function move_head($d, $s)
{
	global $knots;

	echo "\n\nMOVE $d, $s spaces\n";

	for ($m = 0; $m < $s; $m++)
	{

		echo "\n\tIteration $m...\n";

		[ $headx, $heady ] = end($knots[0]);

		echo "\tHead starts at (", $headx, ",", $heady, ")\n";

		switch ($d)
		{
			case 'U':
				array_push($knots[0], [ $headx, $heady - 1 ]);
				break;
			case 'R':
				array_push($knots[0], [ $headx + 1, $heady ]);
				break;
			case 'D':
				array_push($knots[0], [ $headx, $heady + 1 ]);
				break;
			case 'L':
				array_push($knots[0], [ $headx - 1, $heady ]);
				break;
		}

		[ $headx, $heady ] = end($knots[0]);
		echo "\tHead ends at (", $headx, ",", $heady, ")\n";

		move_tail();

		// status();

	}

}



function move_tail() 
{
	echo "\tMoving tail...\n";
	for ( $k = 1; $k <= 9; $k++ )
	{
		move_knot($k);
	}
}


function move_knot($k)
{
	global $knots;

	[ $headx, $heady ] = end($knots[$k-1]);
	[ $tailx, $taily ] = end($knots[$k]);

	$xdiff = $headx - $tailx;
	$ydiff = $heady - $taily;

	// No movement
	if ($xdiff == 0 && $ydiff == 0)
	{
		// No movement, head is on top of tail
		$new = [ $tailx, $taily ];
		array_push($knots[$k], $new);
		echo "\t\tKnot[$k] stayed put (under previous)!\n";		
	}
	
	// No movement
	elseif (abs($xdiff) == 1 && abs($ydiff) == 1)
	{
		// No movement, head is on top of tail
		$new = [ $tailx, $taily ];
		array_push($knots[$k], $new);
		echo "\t\tKnot[$k] stayed put (touching diagonally)!\n";		
	}

	// No movement
	elseif (abs($xdiff) == 1 && $ydiff == 0)
	{
		// No movement, head is on top of tail
		$new = [ $tailx, $taily ];
		array_push($knots[$k], $new);
		echo "\t\tKnot[$k] stayed put (touching x-ish)!\n";		
	}

	// No movement
	elseif ($xdiff == 0 && abs($ydiff) == 1)
	{
		// No movement, head is on top of tail
		$new = [ $tailx, $taily ];
		array_push($knots[$k], $new);
		echo "\t\tKnot[$k] stayed put (touching y-ish)!\n";		
	}

	// Move tail horizontally
	elseif ( abs($xdiff) == 2 && $ydiff == 0 ) 
	{
		$new = [ $tailx + $xdiff/2, $taily ];
		array_push($knots[$k], $new);
		echo "\t\tKnot[$k] moved horizontally!\n";
	}

	// Move tail vertically
	elseif ( $xdiff == 0 && abs($ydiff) == 2 )
	{
		$new = [ $tailx, $taily + $ydiff/2 ];
		array_push($knots[$k], $new);
		echo "\t\tKnot[$k] moved vertically!\n";
	}

	// Move tail diagonally
	elseif ( abs($xdiff) == 2 && abs($ydiff) == 1 )
	{
		$new = [ $tailx + $xdiff/2, $taily + $ydiff ];
		array_push($knots[$k], $new);
		echo "\t\tKnot[$k] moved diagonally (x-ish)!\n";
	}

	// Move tail diagonally
	elseif ( abs($xdiff) == 1 && abs($ydiff) == 2 )
	{
		$new = [ $tailx + $xdiff, $taily + $ydiff/2 ];
		array_push($knots[$k], $new);
		echo "\t\tKnot[$k] moved diagonally (y-ish)!\n";
	}

	// Move tail diagonally
	elseif ( abs($xdiff) == 2 && abs($ydiff) == 2 )
	{
		$new = [ $tailx + $xdiff/2, $taily + $ydiff/2 ];
		array_push($knots[$k], $new);
		echo "\t\tKnot[$k] moved diagonally (extra)!\n";
	}

	else 
	{
		echo "OOOPS...problem with $k...what to do if xdiff is $xdiff and ydiff is $ydiff?!??!!\n";
		status();
		exit;
	}

}



function graph() 
{
	global $knots;

	$xmax = 0;
	$xmin = 0;

	$ymax = 0;
	$ymin = 0;

	foreach ($knots as $knot) 
	{
		foreach ($knot as $coords) 
		{
			{
				$xmax = $coords[1] > $xmax ? $coords[1] : $xmax;
				$xmin = $coords[1] < $xmin ? $coords[1] : $xmin;
				$ymax = $coords[0] > $ymax ? $coords[0] : $ymax;
				$ymin = $coords[0] < $ymin ? $coords[0] : $ymin;
			}
		}
	}

	$graph = array();
	foreach (range($ymin - 1, $ymax + 1) as $y)
	{
		foreach (range ($xmin - 1, $xmax + 1) as $x)
		{
			$graph[$x][$y] = '.';
		}
	}
	$graph[0][0] = 's';

	foreach ($knots as $k=>$path)
	{
		[$y, $x] = end($path);
		if ($graph[$x][$y] == '.')
		{
			$graph[$x][$y] = $k;
		}
	}

	echo "\n\n";
	foreach ($graph as $y=>$row)
	{
		foreach ($row as $x=>$col)
		{
			echo $graph[$y][$x];
		}
		echo "\n";
	}
	echo "\n\n";

}

function status()
{
	global $knots;

	echo "\n\nSTATUS:\n";
	for ( $i = 0; $i < count($knots); $i++ )
	{
		echo "\tLast position for knot $i...(", end($knots[$i])[0], "," , end($knots[$i])[1], ")\n";
	}
	graph($knots);
}



?>