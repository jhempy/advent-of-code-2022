<?php

echo "Start...\n\n\n";

$file = "input.txt";

$input = fopen($file, "r") or die("Unable to open file!");
$raw = fread($input,filesize($file));
fclose($input);

$directory = array();
$current = array();

$lines = explode("\n", $raw);

foreach ($lines as $l)
{

	echo $l, "\n";

	$parts = parse_line($l);

	switch ($parts[0])
	{

		case '$':
			// shell command
			switch ($parts[1])
			{
				case 'cd':
					// change directory
					change_directory($parts[2]);
					break;
				case 'ls':
					// list directory
					// this is such a hack
					add_file('PLACEHOLDER', 0);
			}
			break;

		case 'dir':
			// found another directory to traverse
			add_directory($parts[1]);
			break;

		default:
			// file name and size
			add_file($parts[1], $parts[0]);

	}

}


print_r($directory);


$self_sums = array_map('array_sum', $directory);

print_r($self_sums);


$inclusive_sums = $self_sums;


$dir_list = array_keys($self_sums);
usort($dir_list,'strlen_sort');


print_r($dir_list);


foreach ($dir_list as $d)
{
	if ($d != '/')
	{
		$temp = explode('|', $d);
		array_pop($temp);
		$parent = join('|', $temp);
		$inclusive_sums[$parent] += $inclusive_sums[$d];
	}

}


print_r($inclusive_sums);


$max_space = 70000000;
$needed = 30000000;
$used = array_sum($self_sums);
$free = $max_space - $used;
$min_to_delete = $needed - $free;

$candidate = $needed;

foreach ($inclusive_sums as $dir=>$dir_size)
{
	if ($dir_size >= $min_to_delete && $dir_size < $candidate) 
	{
		$candidate = $dir_size;
		echo "Candidate is now...[$candidate]\n";
	}
}



print "\n\n$candidate\n\n";


echo "\n\nDone!\n";







// Functions

function strlen_sort($a,$b)
{
    return strlen($b)-strlen($a);
}

function where_am_i() 
{
	global $current;
	$temp = $current;
	$location = 'directory';
	$closing = '';
	while (count($temp) > 0)
	{
		$location .= "['" . array_pop($temp);
		$closing .= "']";
	}
	return $location . $closing;
}


function change_directory($new)
{
	global $current;
	echo "\tLOG: Changing directory to $new\n";
	if ($new == '..')
	{
		array_pop($current);
	}
	else 
	{
		array_push($current, $new);
	}
	print_r($current);
}


function add_file($file, $size)
{
	global $current, $directory;
	$here = join('|', $current);
	$directory[$here][$file] = $size;
	echo "\tLOG: Added file $file to $here\n";
}


function add_directory($new)
{
	global $current;
	echo "\LOG: Adding directory $new\n";
}



function parse_line($l)
{
	$parts = explode(' ', $l);
	return $parts;
}


?>