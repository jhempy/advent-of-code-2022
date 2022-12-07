<?php

echo "Start...\n";

$file = "input.txt";

$input = fopen($file, "r") or die("Unable to open file!");
$raw = fread($input,filesize($file));
fclose($input);

$guide = explode("\n", $raw);

$options = ['rock', 'paper', 'scissors'];

$plays = 
[
	'A' => 'rock',
	'B'	=> 'paper',
	'C' => 'scissors',
];

$outcomes = [
	'X' => 'lose',
	'Y' => 'draw',
	'Z' => 'win',
];

$points =
[
	'rock' 		=> 1,
	'paper' 	=> 2,
	'scissors' 	=> 3,
	'lose' 		=> 0,
	'draw'		=> 3,
	'win' 		=> 6,
];

$score = 0;

foreach ($guide as $index => $instruction) 
{

	// Parse
	$player = explode(" ", $instruction);
	$them = $plays[$player[0]];
	$outcome = $outcomes[$player[1]];
	echo "Round $index:\n";

	// Score win, loss, draw
	$score = $score + $points[$outcome];

	echo "\tThey played $them\n";
	echo "\tI need to $outcome\n";

	// Score for play
	if ( $outcome === "win" )
	{
		$my_play = beats($them);
		$play_points = $points[$my_play];
		$score = $score + $play_points;
		echo "\tI will play $my_play for $play_points points\n";
	}
	elseif ( $outcome === "draw" )
	{
		$my_play = draws($them);
		$play_points = $points[$my_play];
		$score = $score + $play_points;
		echo "\tI will play $my_play for $play_points points\n";
	}
	else
	{
		$my_play = loses_to($them);
		$play_points = $points[$my_play];
		$score = $score + $play_points;
		echo "\tI will play $my_play for $play_points points\n";
	}

	echo "\tMy running score is ", $score, "\n";

}


echo $score;


echo "\n\nDone!\n";



function beats($play)
{
	global $options, $codes;
	$this_index = array_search($play, $options);
	$beats_index = ($this_index + 1) % count($options);
	return $options[$beats_index];
}

function draws($play)
{
	return $play;
}

function loses_to($play)
{
	global $options, $codes;
	$this_index = array_search($play, $options);
	$loses_to_index = ((count($options) - 1) + $this_index) % count($options);
	return $options[$loses_to_index];
}



?>