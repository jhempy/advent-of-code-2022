<?php

require_once('rucksack.php');

echo "Start...\n";

$file = "input.txt";

$priorities = array_merge( [''], range('a', 'z'), range('A', 'Z') ); 
$total = 0;
$group_size = 2; // Index! Not actual number! So subtract 1!

$input = fopen($file, "r") or die("Unable to open file!");
$raw = fread($input,filesize($file));
fclose($input);

$stuff = explode("\n", $raw);


$group = [];

foreach ($stuff as $s) 
{

	echo "\n\n\n\n";

	echo "Making new rucksack from $s\n";
	$r = new rucksack($s);

	if ( count( $group ) < $group_size )
	{
		array_push($group, $r);
	}
	else {
		array_push($group, $r);
		echo "Group filled!\n";

		$badge = array_values(
					array_intersect(
						array_keys($group[0]->all()), 
						array_keys($group[1]->all()),
						array_keys($group[2]->all())
					)
				);

		print_r($badge);

		foreach ($badge as $b)
		{
			$p = item_priority($b);
			echo "$p\n";
			$total = $total + $p;
		}

		echo "\n";		

		$group = [];
	}

}



echo "\n\n", $total, "\n";

echo "\n\nDone!\n";


function item_priority( $item )
{
	global $priorities;
	return array_search( $item, $priorities );
}




?>