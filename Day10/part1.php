<?php

echo "Start...\n\n\n";

$file = "test.txt";

$input = fopen($file, "r") or die("Unable to open file!");
$raw = fread($input,filesize($file));
fclose($input);

$lines = explode("\n", $raw);

foreach ($lines as $l)
{


}

echo "\n\nDone!\n";




?>