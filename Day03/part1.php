<?php

require_once('rucksack.php');

echo "Start...\n";

$priorities = array_merge( [''], range('a', 'z'), range('A', 'Z') ); 
$total = 0;

$file = "input.txt";

$input = fopen($file, "r") or die("Unable to open file!");
$raw = fread($input,filesize($file));
fclose($input);

$stuff = explode("\n", $raw);

foreach ($stuff as $s) 
{

	echo "\n\n\n\n";


	$r = new rucksack($s);


	$r->print();


	$mistake = array_values(array_intersect(array_keys($r->compartment(1)), array_keys($r->compartment(2))));

	print_r($mistake);

	foreach ($mistake as $m)
	{
		$p = item_priority($m);
		echo "$p\n";
		$total = $total + $p;
	}

	echo "\n";


}



echo "\n\n", $total, "\n";

echo "\n\nDone!\n";


function item_priority( $item )
{
	global $priorities;
	return array_search( $item, $priorities );
}




?>