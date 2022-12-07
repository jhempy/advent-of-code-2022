<?php

echo "Start...\n";

$file = "input.txt";

$input = fopen($file, "r") or die("Unable to open file!");
$raw = fread($input,filesize($file));
fclose($input);

$guide = explode("\n", $raw);

$options = ['rock', 'paper', 'scissors'];

$code = 
[
	'A' => 'rock',
	'B'	=> 'paper',
	'C' => 'scissors',
	'X' => 'rock',
	'Y' => 'paper',
	'Z' => 'scissors',
];

$points =
[
	'rock' => 1,
	'paper' => 2,
	'scissors' => 3,
];

$score = 0;

foreach ($guide as $index => $instruction) 
{

	// Parse
	$player = explode(" ", $instruction);
	$them = $code[$player[0]];
	$me = $code[$player[1]];
	echo "Round $index: ", $them, ' vs ', $me, "\n";

	// Score for my play
	$score_for_play = $points[$me];
	$score = $score + $score_for_play;
	// echo "\tI played ", $me, " and scored $score_for_play\n";

	// Score win, loss, draw
	if ( $me === $them )
	{
		// Tie!
		// echo "\tWe tied! I get 3 points.\n";
		$score = $score + 3;
	}
	elseif ( $me === beats($them) )
	{
		// Win!
		// echo "\tI won! I get 6 points!\n";
		$score = $score + 6;
	}
	else
	{
		// Loss. :-(
		// echo "\tI lost. No points.\n";
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





?>