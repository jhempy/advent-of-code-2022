<?php

echo "Start...\n\n\n";

// $forest = [
// 	[3,0,3,7,3],
// 	[2,5,5,1,2],
// 	[6,5,3,3,2],
// 	[3,3,5,4,9],
// 	[3,5,3,9,0]
// ];

$forest = [
	[3,1,3,2,1,3,1,2,3,2,1,2,2,0,0,3,1,2,0,1,1,2,4,3,2,0,3,1,2,0,2,1,4,0,1,0,2,0,2,5,5,4,4,2,0,3,3,5,0,4,5,1,1,6,2,0,3,1,0,1,0,0,5,2,1,2,5,2,5,1,3,1,0,1,5,3,0,5,5,1,1,1,4,0,0,1,2,4,3,1,0,2,2,1,1,3,1,1,3],
	[2,2,2,0,2,1,3,3,3,1,1,2,3,2,2,2,4,4,2,3,1,5,4,2,0,5,4,0,2,3,3,5,4,5,1,1,3,0,4,4,3,1,2,1,6,3,1,2,5,3,4,4,5,3,5,6,0,1,0,5,6,6,0,2,5,3,4,4,5,3,1,1,0,2,0,2,4,4,2,3,3,1,3,0,1,4,4,3,1,3,4,4,0,0,3,0,3,2,2],
	[2,0,0,0,1,2,2,2,0,3,0,0,1,3,2,3,1,0,2,3,3,1,0,0,0,2,5,5,2,4,0,3,2,0,0,3,3,5,5,1,4,4,5,3,6,1,2,6,2,3,2,1,6,1,3,3,0,1,0,6,1,1,5,2,1,3,4,4,1,4,5,0,5,5,2,2,3,5,5,1,4,0,0,0,2,4,3,1,2,0,2,1,0,0,3,1,1,3,0],
	[1,0,2,1,1,1,1,2,4,0,4,4,0,3,3,1,1,3,2,4,1,4,1,5,1,5,5,4,0,1,0,5,6,0,1,4,5,0,6,2,0,3,4,1,3,2,1,6,6,5,1,5,2,0,2,0,6,6,1,3,3,4,2,3,5,3,0,5,2,5,0,5,4,4,5,0,0,0,3,2,1,0,4,3,1,2,1,0,2,1,4,3,0,4,4,0,0,2,1],
	[2,2,1,1,3,4,0,2,1,0,1,0,0,3,1,3,2,0,1,0,1,5,4,2,2,1,3,3,4,0,1,1,3,5,5,2,1,6,1,1,1,3,3,5,0,1,2,3,5,1,6,1,5,4,1,3,4,6,5,4,0,4,6,2,5,0,2,2,3,0,3,3,0,0,0,4,1,3,4,4,3,3,2,1,2,3,1,2,3,3,1,4,2,2,1,3,0,1,0],
	[1,1,2,2,4,1,2,3,3,1,1,4,2,4,5,2,0,2,5,2,3,2,0,1,4,3,3,0,1,3,4,6,0,3,2,0,6,6,4,0,3,4,2,0,2,6,0,2,1,4,4,0,0,6,0,2,2,6,2,1,2,5,3,5,3,6,2,1,3,2,2,2,4,0,0,1,3,1,1,2,0,3,4,5,1,5,1,0,1,4,0,1,4,1,3,1,1,3,3],
	[1,3,2,2,1,1,1,3,0,1,1,4,1,4,1,4,0,1,3,2,5,1,4,1,2,1,2,4,6,0,5,4,0,6,5,6,5,2,5,1,0,6,6,5,1,1,5,2,0,1,2,0,6,3,4,0,4,6,3,3,6,5,1,3,4,0,2,2,3,3,6,1,4,4,3,2,0,1,5,2,0,0,5,4,1,1,3,5,4,1,1,4,4,0,4,3,0,3,1],
	[3,2,3,1,4,0,3,2,0,0,2,4,3,1,4,0,0,5,2,1,0,1,5,5,3,1,6,2,0,2,1,5,2,5,5,2,6,2,1,4,1,5,6,6,0,0,6,3,1,1,2,1,7,7,5,6,4,6,0,3,2,4,1,2,1,2,3,1,2,0,2,5,0,3,6,5,5,1,3,5,0,3,1,3,2,2,5,5,0,4,3,1,4,4,0,4,1,1,2],
	[0,1,4,0,1,3,2,4,2,0,4,1,2,3,0,5,1,0,4,4,2,2,6,5,2,0,5,6,2,5,3,3,1,1,1,5,5,4,0,2,2,2,7,4,4,5,1,6,2,6,6,1,6,7,2,5,4,2,1,6,3,5,4,0,4,3,5,3,3,0,2,0,3,4,6,5,0,2,0,3,2,5,3,4,2,3,1,1,2,1,0,4,4,4,4,1,2,2,0],
	[2,3,3,4,1,4,0,3,0,1,0,1,3,1,5,2,5,5,3,3,5,1,2,6,0,5,5,2,6,3,1,4,4,5,1,2,1,1,1,7,7,7,4,6,4,6,1,1,5,6,5,2,1,6,1,5,7,4,4,1,6,7,3,7,0,6,1,0,0,5,0,6,2,4,1,4,2,3,0,3,0,4,0,3,4,2,0,3,4,3,1,1,2,3,4,2,0,3,0],
	[1,3,3,1,4,4,3,1,4,4,1,2,5,5,3,3,3,0,0,1,2,4,4,6,4,0,4,2,4,4,4,3,3,4,6,5,4,3,4,6,6,6,7,6,2,1,3,5,1,1,6,6,7,7,7,6,5,2,1,3,4,6,3,4,4,4,4,6,0,6,1,2,5,1,1,1,3,1,3,4,0,3,3,2,5,5,2,4,2,4,2,0,1,2,0,4,1,2,0],
	[0,1,0,3,2,0,4,0,2,3,3,2,5,1,2,1,1,0,3,6,3,2,1,3,0,4,4,5,3,0,3,3,5,6,5,5,6,1,3,5,6,2,2,2,3,7,5,6,5,7,2,4,2,4,7,4,6,4,3,7,5,6,7,6,7,2,2,6,2,2,5,6,4,3,1,5,4,0,2,1,0,0,0,5,3,1,0,5,4,4,2,4,3,4,4,4,1,0,1],
	[3,2,4,4,0,3,4,1,1,2,3,2,2,3,0,2,0,0,2,1,5,1,4,4,2,5,4,5,5,0,2,5,7,2,7,5,1,4,4,5,3,5,3,2,3,4,5,2,2,7,6,7,6,2,2,3,4,3,5,4,3,6,1,5,5,2,5,3,6,1,5,3,6,1,2,0,1,2,2,6,0,5,0,2,4,2,5,4,1,0,5,0,5,3,1,4,2,1,2],
	[0,4,4,1,4,3,0,2,1,3,0,4,5,3,3,0,3,6,5,2,4,1,1,5,2,0,0,3,6,3,1,2,2,1,4,6,1,4,4,4,4,3,3,5,7,7,4,6,1,3,4,5,6,7,1,3,3,4,1,7,5,7,2,1,4,3,5,7,2,2,1,7,2,5,3,4,6,6,6,6,5,4,2,0,0,0,4,5,4,4,0,0,2,0,5,2,3,0,4],
	[0,3,1,3,0,1,2,0,5,4,4,2,3,1,3,6,6,4,2,5,3,2,0,0,3,5,3,7,2,1,5,2,3,3,3,7,4,5,1,1,3,7,5,5,4,5,5,5,3,8,5,8,3,3,3,4,1,7,1,5,2,2,7,5,5,4,3,3,1,5,6,6,1,5,1,2,4,4,3,3,4,4,4,6,3,6,3,0,3,5,2,3,2,4,2,2,0,3,2],
	[4,1,2,0,2,1,1,3,2,2,5,4,1,2,6,3,4,0,6,4,2,2,5,0,2,1,2,4,1,5,4,7,1,5,1,3,3,7,7,1,4,3,6,5,3,5,4,5,7,4,4,3,6,4,6,6,2,7,6,1,5,1,4,3,6,4,4,2,6,4,3,6,2,5,1,4,2,2,4,5,0,3,0,5,5,0,2,4,4,5,2,3,0,3,5,1,1,4,2],
	[4,2,3,0,1,3,5,2,5,4,2,4,3,3,4,6,5,0,5,1,2,3,5,1,2,4,2,1,3,2,5,4,4,1,2,7,6,1,5,6,5,5,7,3,8,2,6,8,2,3,3,8,5,2,5,2,7,8,7,7,8,8,7,5,7,7,4,5,4,3,1,7,7,1,5,3,7,3,5,6,6,2,1,0,5,1,0,6,3,3,0,1,3,1,4,5,0,2,0],
	[3,1,4,0,1,3,0,4,2,2,4,4,6,2,2,6,0,2,0,0,6,1,1,7,6,6,4,7,1,3,6,5,2,2,6,3,5,2,8,4,7,5,8,3,3,4,3,3,2,6,3,8,4,6,4,6,8,7,6,3,6,7,8,4,4,7,1,3,4,7,1,6,6,3,5,3,4,5,0,5,0,2,2,5,5,0,4,1,1,2,3,1,5,1,2,4,3,1,2],
	[2,1,0,5,3,0,0,3,2,5,5,5,0,5,1,3,2,0,5,1,4,6,6,1,1,1,1,4,1,4,7,3,4,2,6,3,4,7,2,8,5,2,6,8,2,7,2,4,4,8,5,7,7,2,6,2,3,2,6,6,5,6,5,8,2,2,4,2,3,3,6,5,2,6,4,5,1,2,5,4,1,0,6,1,2,2,6,5,4,0,1,0,3,1,4,2,2,2,3],
	[2,0,2,5,2,3,2,1,0,1,4,0,3,4,6,2,3,3,0,2,7,3,7,2,3,6,2,5,5,7,1,2,5,4,3,6,3,6,8,7,2,5,5,3,6,2,2,8,6,2,4,8,6,5,3,4,4,7,7,4,3,7,8,5,3,7,8,8,8,7,4,7,1,7,1,6,6,5,5,6,4,1,4,3,3,3,1,1,0,1,5,0,1,2,1,2,3,4,0],
	[3,1,2,1,0,2,1,5,0,2,0,0,5,0,3,3,6,0,5,3,4,1,3,2,4,4,5,5,1,7,4,8,4,6,7,8,5,8,3,5,8,7,6,7,8,7,5,6,7,6,6,7,6,3,7,4,7,7,2,5,4,7,5,7,2,4,2,2,8,7,2,4,3,1,7,6,7,5,1,6,6,6,6,0,5,3,6,2,4,6,1,0,2,0,4,4,4,0,4],
	[0,1,4,5,0,1,1,5,0,5,1,4,4,0,4,5,0,6,2,2,6,4,2,4,1,5,5,7,6,2,4,3,2,3,8,6,2,2,7,8,4,6,2,5,8,6,2,5,4,7,8,3,3,4,7,6,8,3,7,5,8,6,2,8,2,7,4,7,6,4,3,3,5,5,3,6,5,1,3,1,1,4,6,0,1,1,6,1,3,3,6,3,1,4,4,0,2,1,3],
	[1,4,5,3,4,5,0,2,5,4,0,2,1,3,2,6,0,1,2,2,2,2,3,4,2,7,1,2,6,8,8,3,4,8,3,8,2,4,4,2,8,7,7,6,5,9,9,4,9,3,6,6,8,9,3,9,7,8,3,6,4,2,4,2,8,4,6,4,4,6,7,6,3,4,2,5,7,7,4,5,1,3,5,6,4,6,3,1,3,2,0,6,2,2,3,4,2,3,2],
	[0,3,0,5,2,0,5,3,3,6,0,0,0,6,0,4,6,5,6,7,4,7,4,3,5,4,3,8,3,2,4,3,5,6,2,2,2,7,5,5,9,4,6,6,6,9,3,3,4,7,3,9,5,7,8,6,4,6,3,7,4,2,7,2,8,4,2,8,4,5,2,8,8,6,6,4,2,6,7,3,4,2,5,7,0,3,3,4,1,3,6,1,1,1,5,3,5,4,2],
	[1,1,1,1,2,5,2,2,2,1,2,6,1,2,6,6,6,4,6,2,5,2,1,7,5,5,5,8,7,4,2,2,4,6,2,3,3,3,7,8,5,7,8,6,3,4,5,6,9,4,8,8,3,6,7,8,5,3,7,3,3,5,3,7,5,7,7,4,4,6,8,3,2,4,7,3,7,5,6,3,2,6,7,7,5,1,4,3,1,2,5,5,4,4,0,2,0,2,4],
	[4,5,4,3,4,4,2,3,4,3,1,3,5,5,1,6,4,5,7,3,1,7,2,4,6,2,2,5,2,5,3,6,5,8,3,2,6,5,7,8,9,4,5,4,5,7,6,8,9,6,4,5,3,6,9,3,9,3,8,7,8,6,3,9,7,8,4,6,5,6,7,3,4,4,2,2,5,3,7,2,2,1,2,5,7,5,2,5,5,3,2,3,6,1,3,2,0,0,4],
	[1,4,1,3,5,1,6,5,6,6,5,3,2,2,4,2,3,7,2,5,2,1,2,2,8,5,4,2,2,4,8,5,5,2,5,8,9,3,8,5,9,3,9,4,6,6,4,8,5,3,7,6,6,9,9,4,4,5,7,5,4,7,8,9,8,6,7,3,4,7,2,3,2,2,5,8,5,6,7,6,1,5,7,1,6,3,4,0,3,6,1,1,4,3,2,3,2,0,2],
	[3,0,1,3,5,4,1,3,0,4,1,1,2,2,3,5,5,5,4,6,6,4,1,6,8,4,4,5,5,5,8,4,7,6,7,7,8,5,3,8,5,5,4,3,3,6,3,6,7,7,4,8,5,7,8,9,7,5,6,3,3,8,6,8,7,3,3,9,2,2,6,5,4,4,7,7,2,8,5,4,5,6,3,4,5,5,5,2,3,4,2,1,4,0,0,3,5,5,5],
	[3,2,4,3,5,1,5,0,0,3,5,1,1,5,6,1,4,2,5,5,4,6,5,4,7,2,2,5,5,7,4,5,8,4,8,8,6,9,8,5,4,7,3,5,5,9,9,4,4,6,3,7,6,6,4,5,4,6,8,7,4,8,9,8,9,8,4,8,5,7,5,3,4,7,3,7,7,7,5,7,4,1,2,4,6,1,3,4,1,4,6,5,2,5,0,4,0,0,4],
	[0,0,0,2,0,2,5,2,6,6,0,3,5,6,6,6,2,4,2,7,1,2,8,8,8,6,7,4,2,8,7,9,9,6,8,5,3,5,8,6,9,8,7,5,9,6,5,6,8,4,9,9,7,8,5,5,3,8,9,5,8,3,6,9,9,6,3,8,8,4,3,3,2,5,2,5,4,5,5,4,6,2,6,6,7,5,3,5,5,1,3,2,2,3,0,5,1,2,3],
	[1,4,2,1,4,0,4,5,0,6,5,6,7,7,6,2,2,7,7,1,4,4,6,6,5,8,5,8,3,3,7,9,8,8,7,4,9,7,5,6,3,5,7,6,7,7,9,5,4,4,5,8,7,4,9,4,6,6,4,5,4,6,5,4,7,7,8,4,9,7,7,2,4,6,4,6,8,4,5,2,7,5,2,5,2,1,3,2,3,6,0,2,3,5,2,4,2,2,0],
	[3,2,4,2,6,2,3,5,3,5,0,5,6,7,3,3,1,5,7,2,4,2,3,6,4,4,5,7,4,8,5,3,6,3,8,8,9,7,3,6,6,8,6,5,4,5,8,8,5,9,9,8,9,6,8,5,4,4,6,9,5,3,5,4,9,4,8,3,8,6,4,3,7,4,4,3,8,7,8,7,2,7,2,1,6,1,5,2,2,1,0,6,3,2,3,5,3,2,1],
	[5,5,2,2,0,6,4,6,3,1,6,7,6,6,6,1,5,4,5,7,7,6,5,8,2,5,8,5,6,9,7,4,4,5,6,7,3,3,9,4,4,6,5,9,6,4,7,4,5,8,6,8,6,8,8,4,8,8,6,6,6,4,5,7,4,3,3,9,9,8,6,9,3,6,2,8,8,6,6,2,6,5,4,7,3,4,4,7,6,7,5,3,3,5,4,6,1,5,3],
	[3,5,2,3,2,3,4,3,4,6,6,3,4,3,7,3,5,5,7,2,5,4,2,7,8,2,6,4,4,9,7,9,9,4,7,7,3,9,5,9,9,9,5,6,5,7,6,4,6,6,8,8,6,5,8,5,4,9,4,5,7,8,7,9,3,6,6,5,4,5,9,4,8,3,2,6,3,3,6,7,8,7,6,7,5,4,1,2,2,5,1,3,1,0,0,1,5,0,3],
	[4,4,0,1,6,6,3,6,2,2,3,3,5,6,2,6,6,7,4,7,8,3,3,5,7,6,3,9,5,6,3,8,9,8,5,7,7,5,5,7,6,7,4,9,7,4,7,5,8,4,8,9,5,9,7,7,8,4,9,8,7,9,9,8,9,5,5,9,5,7,8,5,3,8,7,8,4,4,4,6,4,7,5,7,5,1,3,1,6,2,2,6,5,6,5,2,6,4,0],
	[1,0,4,1,2,2,1,2,4,6,4,2,7,6,6,6,4,2,6,6,4,4,5,2,2,8,3,5,5,5,5,3,7,3,7,6,5,9,8,4,5,7,7,6,7,5,5,8,6,4,7,5,5,4,9,6,9,9,9,5,6,8,5,6,4,5,7,9,5,9,9,9,4,7,5,4,7,3,6,8,7,3,3,6,1,6,5,5,2,3,5,6,0,0,5,2,0,0,1],
	[2,5,5,3,5,2,2,4,3,0,1,5,6,4,1,2,1,7,5,3,4,6,6,7,8,4,9,7,6,9,9,7,5,8,5,9,9,5,5,7,7,8,4,6,4,8,7,6,5,5,5,7,8,6,7,4,7,4,7,4,7,7,4,7,9,4,8,6,4,7,7,8,3,7,3,7,6,8,4,5,2,5,6,2,6,3,7,2,5,5,3,3,0,4,4,4,2,3,2],
	[4,5,6,2,2,0,4,3,2,7,4,7,4,7,6,3,3,6,8,6,6,7,8,2,2,4,6,8,7,3,6,9,8,6,9,7,6,7,7,6,9,9,6,8,8,6,7,8,9,9,7,9,7,5,6,7,8,5,4,8,8,5,6,7,5,9,7,4,3,7,7,7,9,7,9,6,3,2,2,6,2,6,3,8,5,6,5,4,1,5,1,3,3,2,1,0,6,3,3],
	[3,5,4,6,4,1,6,4,1,6,6,3,1,6,6,2,4,7,2,3,6,4,6,3,8,6,3,6,8,7,7,4,4,8,8,9,4,4,9,4,9,7,9,6,9,6,6,8,8,8,6,7,6,7,6,8,6,7,5,6,8,9,8,4,9,8,6,9,8,5,4,4,5,7,8,8,5,7,8,3,4,4,8,2,5,1,6,3,6,6,7,4,6,0,4,2,1,0,3],
	[1,2,5,2,0,1,5,6,4,1,1,5,4,3,7,6,8,3,5,6,6,4,2,3,7,4,3,4,8,8,6,4,8,6,4,5,9,4,4,9,6,9,9,6,9,7,6,6,9,8,8,8,5,7,6,5,9,5,9,9,6,4,6,9,4,4,6,5,6,8,4,3,5,5,6,5,8,5,7,6,8,4,4,7,4,7,7,1,4,5,1,2,2,5,3,6,1,0,0],
	[5,6,5,1,6,6,4,5,3,3,1,7,1,6,1,5,6,3,7,4,6,4,2,5,4,3,5,9,5,8,5,4,6,6,4,8,8,5,7,5,8,9,8,5,8,6,8,9,8,6,6,7,7,9,5,7,6,5,9,9,5,5,4,4,7,6,7,8,5,9,6,5,3,5,4,8,8,4,4,4,3,2,8,4,6,1,5,2,6,4,2,5,3,2,5,4,3,1,6],
	[1,2,1,2,4,6,1,2,6,6,7,1,5,5,2,5,7,3,8,2,4,6,4,3,6,3,7,6,6,3,7,9,6,7,6,8,7,4,9,6,9,7,8,7,6,8,5,9,5,9,9,6,8,6,7,9,8,7,5,5,7,5,5,6,6,8,4,7,8,9,9,4,5,3,7,7,8,9,6,7,7,3,3,6,6,7,5,2,5,5,1,1,1,5,0,1,3,0,6],
	[3,6,0,3,5,5,1,3,4,6,7,7,1,5,5,6,7,2,6,3,2,4,3,7,6,7,6,6,6,7,7,9,7,5,4,8,7,7,8,9,8,9,8,7,8,9,5,6,5,8,5,5,5,5,7,5,5,8,8,8,8,6,9,7,9,8,4,4,8,7,9,9,5,5,6,8,9,5,2,2,7,8,7,7,3,8,7,2,4,3,5,6,7,4,1,0,3,4,2],
	[2,0,1,0,4,5,4,2,7,6,2,3,1,7,6,6,3,5,7,7,6,4,6,9,9,9,9,8,8,3,7,4,9,9,4,4,8,9,6,8,9,9,9,7,7,9,9,5,8,8,9,9,6,8,8,7,5,5,9,5,5,5,9,5,5,6,9,7,5,8,8,6,9,9,8,7,4,4,4,6,3,2,4,3,5,6,3,1,1,2,1,6,5,2,0,1,3,2,6],
	[3,5,2,2,5,0,1,1,5,5,4,6,1,2,4,5,3,6,5,3,6,7,6,9,4,5,4,4,4,7,7,8,6,7,4,4,4,7,5,7,5,7,9,8,8,9,8,9,8,8,6,9,8,6,9,8,5,7,7,6,9,6,8,6,8,8,8,9,9,5,6,3,5,3,6,6,7,6,8,4,4,4,5,5,4,6,1,4,7,2,3,4,5,3,3,6,2,0,1],
	[4,4,4,0,1,2,3,0,5,2,7,6,5,4,7,2,7,7,5,2,2,5,9,5,3,7,5,6,5,4,9,9,4,5,5,8,8,5,5,8,5,9,8,7,7,9,8,7,9,9,6,6,7,8,8,8,7,7,6,9,8,7,9,9,5,4,8,5,4,5,9,9,8,6,5,5,9,9,8,4,6,6,2,3,7,7,3,4,6,5,5,3,4,0,0,4,1,6,0],
	[0,0,3,6,2,1,6,7,3,4,3,7,6,7,4,2,2,4,2,4,8,4,8,6,5,4,7,9,7,9,8,8,5,8,7,8,9,5,7,5,6,5,7,5,7,6,8,6,9,9,6,8,8,7,7,6,6,9,8,6,5,9,5,5,9,9,4,4,7,8,5,8,6,4,4,6,6,7,4,6,2,2,5,4,2,4,4,5,1,7,6,7,4,2,0,5,0,4,6],
	[0,4,5,2,6,5,1,3,2,2,7,6,4,5,6,3,3,4,5,5,4,3,6,5,8,9,3,9,3,5,7,4,9,6,4,9,9,6,5,9,8,9,5,7,6,7,7,8,7,8,9,8,6,9,6,7,7,5,7,6,7,5,5,7,5,6,8,9,9,9,8,6,5,6,3,7,7,8,7,8,5,5,8,2,6,8,4,6,5,7,4,2,5,2,2,4,5,3,2],
	[2,5,6,1,5,1,3,7,5,6,1,5,7,1,7,5,4,2,5,6,3,6,6,6,8,9,4,8,3,5,7,7,9,5,5,4,8,7,6,7,7,9,5,9,6,9,7,6,9,7,6,6,9,9,8,8,7,7,7,8,5,7,7,9,5,7,4,5,6,8,6,6,5,4,5,6,7,4,4,7,7,2,2,8,6,6,6,7,4,6,3,4,6,4,0,3,6,3,1],
	[1,6,1,1,5,2,4,6,4,3,7,1,7,6,4,2,6,3,6,4,3,3,3,4,3,3,3,3,8,9,7,4,8,9,5,6,9,6,9,5,9,7,6,6,6,7,9,7,7,6,7,8,7,8,8,6,6,7,5,5,9,6,6,5,6,5,4,8,4,6,4,7,6,6,4,8,4,3,5,2,5,8,2,8,6,8,2,4,1,2,3,7,3,7,5,5,4,5,4],
	[5,0,2,0,1,1,5,4,4,7,1,4,1,6,5,4,6,3,8,4,3,2,7,8,4,4,7,4,8,5,4,7,9,7,9,7,8,6,7,6,6,6,8,8,8,6,6,8,7,9,7,7,9,6,7,6,8,9,7,7,7,6,7,5,6,9,5,7,5,7,8,8,8,3,6,3,3,4,5,6,5,4,7,4,6,2,7,5,3,1,4,7,3,7,0,4,2,4,6],
	[1,5,1,4,6,0,3,6,4,2,3,2,4,4,7,4,4,3,2,3,3,5,6,5,9,6,8,7,5,9,9,8,5,8,6,8,7,8,6,5,5,7,9,9,7,7,9,8,9,7,6,8,6,7,6,7,6,9,5,9,5,8,9,9,6,7,8,9,8,8,7,4,5,4,5,8,3,6,4,3,2,5,3,7,5,5,4,4,4,1,5,6,6,1,2,2,3,1,4],
	[3,2,5,3,5,4,0,1,4,3,2,3,7,6,7,7,2,2,2,6,4,8,8,9,5,8,4,5,3,4,8,9,7,6,6,6,5,6,9,9,9,6,5,9,6,6,6,8,6,7,8,7,7,8,9,6,8,6,9,6,7,9,9,9,9,6,6,4,9,7,6,4,9,7,4,4,8,9,8,7,4,2,5,2,5,7,6,5,6,3,2,2,1,2,4,4,3,5,6],
	[3,0,0,1,6,5,6,6,3,4,4,2,4,1,4,4,6,8,3,8,2,6,3,8,9,6,7,4,7,6,9,9,5,9,8,4,9,5,9,9,8,8,8,6,8,8,8,7,6,9,9,9,6,7,6,7,6,5,9,7,9,8,6,5,7,7,7,9,8,9,4,7,6,4,8,8,8,9,5,2,7,7,2,8,2,2,5,3,4,1,3,4,5,1,4,4,1,2,6],
	[5,2,3,0,4,4,1,4,6,5,3,7,2,2,7,2,8,4,2,3,6,8,5,4,8,6,7,8,8,4,5,4,6,5,6,6,8,9,6,8,9,6,5,8,9,6,7,8,6,8,9,8,7,7,7,9,9,5,6,7,9,9,6,8,8,4,7,4,7,7,8,9,5,6,9,8,6,9,3,7,4,7,4,6,4,4,3,2,3,6,3,5,6,1,2,1,6,3,1],
	[6,2,3,5,2,0,0,1,6,2,5,6,2,3,6,6,7,2,2,3,8,3,9,3,5,5,7,6,6,5,7,4,6,5,8,8,4,5,7,9,7,7,5,7,8,8,9,7,8,6,7,8,6,7,6,8,9,8,7,7,7,7,8,8,5,7,9,4,8,8,8,5,3,5,3,7,6,7,5,2,6,3,6,7,4,7,2,6,5,5,6,3,4,2,1,1,3,2,4],
	[5,1,3,1,1,2,3,2,3,7,4,3,7,7,7,4,2,8,3,5,5,6,9,7,5,6,4,9,7,4,7,5,8,7,5,5,9,8,8,7,8,5,9,8,6,5,6,8,9,7,9,8,6,8,9,7,9,6,8,5,6,8,5,9,9,7,8,4,7,9,6,7,5,8,6,9,4,3,8,4,2,2,4,8,4,7,3,2,5,5,4,5,1,0,5,3,3,1,1],
	[4,5,0,0,2,0,5,0,6,7,6,4,5,3,5,7,8,4,3,6,6,6,4,4,9,7,6,9,9,7,5,8,8,7,5,7,4,9,8,8,5,6,7,7,9,7,8,6,8,7,6,6,8,6,7,7,5,8,6,8,8,5,5,9,9,6,7,4,6,5,5,4,3,9,4,5,7,9,6,4,5,6,3,8,7,5,6,6,3,2,4,1,7,6,3,5,4,3,0],
	[3,3,3,3,0,2,1,0,6,6,5,3,7,6,6,6,7,5,8,7,3,3,3,9,7,9,9,5,3,5,4,7,4,6,4,6,8,7,9,9,9,6,7,8,9,7,8,8,9,8,7,8,7,5,5,8,7,9,7,7,7,5,5,5,8,7,8,8,4,5,8,8,4,9,8,3,6,6,5,2,5,2,6,3,6,5,7,2,4,1,2,4,4,5,6,3,4,1,1],
	[0,2,1,6,0,3,3,4,5,3,1,3,2,1,3,6,3,2,2,6,7,7,5,4,5,7,5,3,4,6,9,9,5,9,4,7,8,4,8,5,6,5,6,9,5,8,7,8,9,6,9,8,8,5,7,6,7,8,6,9,7,7,5,8,6,8,7,5,9,8,4,6,3,7,6,8,7,4,2,3,5,7,8,3,8,5,4,2,3,5,2,2,1,0,6,6,0,6,0],
	[4,5,1,0,5,1,1,0,5,6,7,6,4,1,5,3,5,3,8,3,4,2,3,9,8,7,9,4,7,7,6,8,9,6,6,4,8,7,8,6,7,8,5,7,8,5,5,9,6,5,8,5,7,9,5,5,8,8,5,8,8,5,9,6,8,5,6,5,6,6,4,6,3,3,3,6,4,3,2,8,2,5,7,8,7,5,1,3,6,1,2,2,1,4,5,0,0,4,3],
	[3,2,3,1,3,3,1,5,1,1,6,7,3,1,2,4,5,7,2,3,4,6,5,7,5,5,9,7,6,5,7,5,7,9,9,9,4,6,8,4,6,7,6,9,8,8,6,9,9,6,9,6,6,6,8,6,5,8,9,7,7,9,7,8,5,7,4,8,5,4,9,9,5,6,9,8,3,8,4,6,4,5,6,5,7,7,1,4,4,3,3,4,1,4,3,3,6,2,4],
	[3,5,1,2,2,6,4,3,5,2,1,6,6,7,7,6,4,5,3,7,8,4,4,2,6,3,6,3,9,3,8,5,8,5,6,9,6,8,8,4,6,4,6,9,6,6,5,9,6,7,9,6,5,8,7,7,7,5,5,9,8,7,9,9,7,8,7,6,5,5,3,9,9,8,6,8,4,2,8,3,3,5,2,8,3,4,7,4,7,7,1,4,2,3,6,4,3,5,5],
	[3,1,2,5,2,2,0,1,5,1,3,4,5,5,2,5,7,6,8,4,3,5,6,4,2,4,6,3,9,3,4,7,9,9,7,5,8,5,6,5,8,5,9,4,5,6,5,9,5,7,6,9,8,6,5,7,5,9,7,9,6,7,8,4,8,7,7,9,4,7,4,8,7,8,7,8,4,3,8,7,7,3,5,8,1,4,7,7,3,5,6,6,3,3,6,4,1,5,3],
	[4,3,6,2,2,1,4,0,5,1,3,2,7,4,2,6,1,6,3,3,3,7,2,3,7,7,4,3,3,5,4,5,7,7,4,8,4,9,8,7,4,7,8,6,9,4,4,5,7,6,8,5,5,7,7,7,7,4,9,6,6,4,5,4,6,9,5,5,7,6,9,4,4,9,7,3,2,2,7,6,3,3,3,5,2,1,7,4,2,4,7,0,4,4,5,2,5,1,6],
	[5,3,1,4,5,3,4,6,4,2,7,6,7,4,6,6,4,6,4,5,8,8,4,8,7,8,4,6,5,8,4,4,7,8,7,4,4,9,9,4,8,5,5,5,9,8,7,7,9,4,8,9,8,6,5,8,5,6,4,4,7,4,8,7,6,5,5,6,6,8,6,3,4,9,6,6,8,5,8,8,4,5,8,5,5,1,4,5,4,4,1,4,5,3,4,3,2,6,1],
	[1,2,4,0,0,4,0,3,5,1,7,5,4,5,5,6,4,3,5,4,7,2,3,6,8,8,5,4,9,4,7,9,4,4,7,9,8,6,5,4,6,4,9,4,6,9,9,9,9,9,8,5,6,8,5,8,6,7,8,8,6,8,9,9,6,7,3,4,3,3,7,7,7,5,8,8,4,5,7,3,8,5,7,1,6,7,2,2,6,4,3,2,1,0,6,1,0,0,3],
	[2,0,0,1,5,5,3,0,6,3,5,1,5,4,3,7,7,7,4,5,7,2,5,7,6,5,7,9,6,8,9,7,4,5,6,8,8,5,6,4,9,5,8,6,5,4,5,4,7,9,8,4,4,9,7,8,4,7,9,9,8,5,8,8,8,4,6,3,7,3,8,6,3,7,5,4,2,2,5,2,6,8,6,4,2,4,3,5,6,5,0,6,2,3,6,4,1,0,2],
	[4,4,5,6,0,1,4,1,4,3,2,1,4,4,4,2,3,5,6,4,8,7,7,3,6,6,4,8,6,6,5,5,9,4,3,7,9,9,6,6,4,4,4,8,7,4,7,6,4,5,9,5,6,5,9,6,4,7,8,5,6,5,9,5,3,9,6,3,5,5,6,8,4,5,6,2,2,3,7,5,5,6,2,7,1,4,5,6,6,3,4,1,6,3,6,0,4,6,3],
	[4,5,0,0,3,4,3,0,2,5,0,2,4,4,3,2,6,2,3,5,4,3,7,7,4,5,7,7,8,9,5,9,8,7,7,6,5,9,6,7,4,6,6,4,8,4,9,5,9,6,8,4,5,7,9,4,6,4,6,5,5,8,8,3,9,9,6,5,6,8,9,8,6,4,6,4,2,6,4,7,2,4,1,1,7,7,7,1,4,6,3,4,1,6,4,4,1,5,0],
	[0,2,3,1,4,6,2,6,4,5,0,4,2,5,6,4,4,1,7,5,6,6,4,5,6,3,4,4,8,7,5,5,5,6,6,4,9,8,7,4,6,8,9,4,6,7,6,6,7,8,4,6,4,7,8,7,7,5,5,8,3,5,9,9,3,6,9,3,4,4,8,3,6,5,4,7,7,4,8,2,6,3,2,4,7,3,5,7,1,4,6,3,3,6,0,3,0,3,0],
	[3,3,3,3,4,2,0,4,5,3,0,0,6,4,2,4,1,7,4,2,1,4,2,7,5,2,2,4,5,8,5,3,8,3,7,8,7,8,5,9,3,3,3,7,4,6,7,9,4,8,8,6,9,6,5,4,9,4,8,8,9,6,4,6,7,3,9,8,5,9,4,8,6,6,7,6,8,8,5,5,3,3,4,4,3,4,3,5,2,2,1,6,3,2,0,1,0,1,0],
	[4,5,5,5,4,5,4,0,2,0,4,3,2,3,5,6,1,5,5,6,4,6,8,5,4,8,5,5,7,6,2,2,8,9,3,5,9,5,8,5,4,4,8,8,3,6,4,3,9,5,5,9,8,4,4,9,3,9,4,5,7,5,6,6,3,5,4,8,7,8,4,3,6,5,3,8,5,2,7,4,7,1,4,7,2,4,6,5,5,6,5,5,3,5,2,3,5,1,0],
	[5,2,1,5,0,3,0,0,5,5,5,5,1,2,4,5,3,6,5,6,5,5,6,6,2,8,4,7,2,3,4,8,4,6,8,8,8,8,5,3,4,8,4,6,5,9,9,8,9,4,8,4,3,5,5,3,5,9,9,7,7,8,3,7,8,5,7,4,2,6,8,4,8,7,3,2,2,8,7,1,2,1,5,2,1,1,7,6,2,2,0,5,4,2,3,5,2,1,5],
	[3,1,2,5,0,4,0,6,6,0,2,0,4,5,7,2,7,4,7,3,1,6,2,5,4,6,3,8,5,8,5,7,7,5,4,4,6,3,7,7,6,4,9,6,6,3,3,8,4,6,6,3,3,9,4,3,5,6,7,7,3,6,4,9,9,7,5,6,8,6,2,3,5,6,2,2,8,6,4,4,1,5,1,6,3,6,7,0,1,5,4,3,0,2,4,3,1,4,0],
	[2,0,5,0,3,1,0,5,3,4,6,1,0,6,3,4,7,3,7,7,7,4,7,4,1,8,6,8,4,4,5,5,3,5,3,2,8,9,7,7,9,7,3,5,7,6,3,8,5,3,9,4,9,7,8,8,9,5,5,4,7,3,9,4,7,6,4,5,5,7,7,8,6,5,8,2,6,7,7,4,2,1,2,1,7,6,5,4,2,0,5,0,6,1,0,2,1,5,5],
	[2,3,4,2,5,4,2,4,1,4,5,2,5,0,3,6,1,7,4,1,2,5,5,6,6,7,2,4,8,4,7,3,5,4,2,7,2,6,9,7,4,9,8,6,4,8,7,3,7,8,3,8,4,9,9,6,4,5,5,9,9,8,3,4,6,3,5,2,6,4,7,4,5,3,6,7,1,4,3,7,7,3,4,1,6,2,0,4,3,0,6,5,2,4,4,5,0,0,5],
	[0,0,5,1,2,2,2,5,6,6,0,1,5,4,1,1,2,1,7,6,7,6,1,7,2,4,3,6,7,3,7,7,5,3,4,5,8,7,3,6,8,8,3,3,5,6,4,3,4,7,7,5,7,4,6,8,6,4,5,4,3,6,2,5,4,5,5,6,6,8,2,4,6,5,5,2,7,1,2,1,6,6,4,1,3,5,3,6,6,3,4,0,5,3,1,2,1,4,3],
	[4,3,3,4,1,2,4,4,3,5,0,3,5,2,6,3,6,6,2,7,4,3,4,6,3,2,1,5,8,7,2,4,8,4,8,3,4,5,8,3,2,5,7,7,4,8,7,3,7,3,4,8,8,9,9,8,7,8,4,3,3,6,8,2,2,7,3,5,7,4,2,5,6,3,6,5,1,3,2,3,4,7,4,0,3,0,4,0,6,1,6,2,3,0,3,3,4,4,2],
	[1,5,0,4,2,5,0,0,5,1,4,3,3,1,5,4,4,5,3,4,3,3,6,6,3,5,7,7,7,6,5,7,2,2,5,8,8,8,4,4,7,8,7,4,2,5,6,3,6,7,8,3,5,7,7,8,3,8,4,5,8,6,2,2,3,5,7,5,8,5,6,4,5,1,3,5,2,5,3,3,7,6,2,2,0,4,6,1,4,6,2,5,3,4,4,0,4,2,5],
	[2,2,5,1,5,5,3,2,3,2,6,4,6,3,1,4,5,6,6,3,5,4,6,2,3,2,5,5,1,1,8,8,5,7,6,4,3,2,6,6,7,5,4,2,8,8,4,6,2,6,8,6,4,6,5,7,5,2,2,5,7,3,4,4,7,4,4,3,7,3,7,6,6,1,2,5,4,4,6,6,7,1,1,1,0,5,3,4,0,6,3,3,2,3,5,4,2,0,5],
	[0,3,5,0,1,4,0,1,1,0,0,0,3,6,5,6,3,0,4,2,7,2,7,7,3,6,3,2,6,1,2,4,4,8,3,6,6,6,8,3,6,7,5,6,2,4,4,8,7,3,4,7,7,2,5,3,3,2,5,2,2,3,4,5,8,8,7,4,6,7,7,5,7,5,2,6,3,3,1,5,4,6,0,1,5,5,3,6,2,4,2,5,4,0,2,0,4,5,5],
	[0,1,2,3,3,2,4,1,5,4,4,2,5,6,6,6,5,0,6,6,6,6,1,7,2,2,5,7,4,7,3,5,4,6,3,8,7,4,7,7,4,6,3,8,4,6,8,2,7,4,3,3,2,6,7,4,6,6,7,8,8,2,6,7,2,8,3,5,5,1,3,1,2,2,5,6,1,4,4,7,0,1,3,2,6,2,3,4,6,2,4,2,4,3,4,2,5,1,4],
	[0,1,3,5,2,4,1,1,3,3,1,1,5,1,1,6,1,5,5,1,6,5,6,3,5,6,2,1,5,5,2,5,6,3,1,4,4,5,3,7,7,7,6,4,3,3,2,4,3,8,3,4,6,4,2,3,6,2,5,4,5,6,5,7,5,2,7,4,2,6,3,7,2,4,7,4,1,1,0,4,6,6,5,1,6,3,3,5,1,1,3,0,2,3,4,4,0,5,1],
	[2,1,2,1,2,2,2,1,2,4,3,0,4,0,4,1,4,0,0,3,2,1,3,4,1,3,1,5,6,4,7,5,6,7,5,2,7,2,5,3,2,2,8,8,5,4,6,6,4,3,4,3,5,2,2,2,4,8,7,5,4,4,6,5,1,5,5,5,2,5,1,7,2,6,7,6,1,4,4,1,0,5,2,4,2,4,4,0,0,4,3,0,1,2,4,0,1,4,3],
	[3,1,1,4,0,0,2,3,5,4,4,5,1,3,2,5,2,0,2,5,4,0,6,5,6,1,7,5,6,6,4,6,4,2,4,5,6,4,1,6,2,3,8,8,8,5,8,7,5,5,6,6,6,7,3,8,5,2,8,7,7,3,5,3,1,2,7,7,6,4,2,1,1,6,1,3,3,4,4,4,5,5,4,4,2,5,1,5,2,4,4,2,0,4,0,0,2,3,2],
	[4,4,0,2,1,5,4,5,2,3,4,1,3,4,4,0,4,3,0,6,2,3,0,0,5,6,7,5,4,4,5,2,4,3,3,2,7,3,3,6,1,1,6,3,6,5,5,2,8,2,2,7,4,2,5,6,7,4,1,6,2,7,7,3,5,4,4,7,7,5,5,7,7,5,6,3,1,2,3,5,4,3,5,3,6,2,2,4,1,5,1,3,5,5,2,0,3,4,2],
	[2,1,2,4,3,0,4,3,0,3,1,3,1,1,4,1,4,3,4,0,6,6,5,6,3,0,5,3,3,6,5,5,1,4,5,2,7,6,2,3,2,7,2,3,3,7,3,6,1,7,2,5,6,3,2,2,4,2,4,2,7,2,5,1,6,2,7,5,1,6,1,6,1,6,1,1,0,2,6,2,3,0,1,3,0,5,5,0,4,1,2,0,3,5,5,3,0,4,0],
	[3,2,1,0,1,0,3,5,3,4,3,3,3,0,5,4,3,5,0,4,2,1,5,1,0,1,6,6,0,3,1,4,2,7,6,2,4,2,5,7,5,4,2,7,3,7,3,7,7,7,7,2,2,1,1,1,1,7,5,1,7,5,1,7,5,4,2,1,7,7,3,4,1,0,5,0,3,4,3,6,6,1,1,6,4,0,0,0,5,0,2,3,5,0,0,1,3,0,1],
	[1,4,1,0,1,2,0,3,0,0,4,3,4,4,1,1,5,2,5,1,5,1,1,0,0,6,6,5,2,0,5,2,5,2,3,1,1,1,2,5,4,7,6,2,4,2,5,6,1,7,3,3,3,1,3,4,6,3,4,1,4,5,1,7,6,1,4,7,2,0,5,3,4,1,1,5,4,6,3,2,3,4,0,4,3,1,0,4,0,4,4,4,3,3,0,2,4,1,1],
	[1,3,3,1,3,3,0,3,4,5,2,2,4,5,4,0,4,3,2,3,2,2,1,3,3,1,2,1,4,5,6,6,4,5,4,6,1,2,6,4,5,2,7,5,5,4,5,3,7,2,4,1,4,4,1,5,4,2,6,1,4,5,4,7,3,3,1,2,4,0,5,4,4,0,3,6,0,5,0,0,4,1,5,0,5,3,5,0,1,0,4,1,3,0,0,0,3,3,4],
	[3,3,1,4,1,2,4,4,1,1,5,2,2,4,0,5,5,1,1,0,4,6,1,2,1,3,1,3,4,4,0,6,4,1,3,1,1,1,2,5,6,4,1,2,6,3,6,2,5,6,1,5,3,2,5,2,3,3,1,1,4,6,2,6,0,4,0,6,1,1,5,1,6,2,3,1,2,1,5,4,3,0,0,3,2,3,4,0,2,1,5,4,3,3,1,2,3,0,3],
	[0,1,0,3,0,1,4,4,2,3,0,2,5,0,0,5,3,4,0,2,1,5,2,5,5,5,2,2,0,5,5,3,6,4,6,6,1,4,4,4,5,4,5,2,3,7,4,1,5,3,5,2,5,5,4,4,4,6,4,1,3,4,5,4,3,0,4,0,2,3,5,6,2,3,4,5,1,4,2,2,1,4,1,0,4,3,5,3,2,4,3,2,1,4,4,0,2,1,1],
	[2,2,2,3,0,1,0,1,4,4,1,0,2,4,2,4,0,4,2,2,1,2,4,0,2,5,0,5,6,3,1,3,4,0,4,0,0,5,6,1,0,4,6,2,6,0,2,1,1,7,3,4,5,4,5,5,0,1,0,3,4,0,0,4,0,0,6,1,6,5,5,0,3,4,0,4,0,0,3,1,0,0,1,5,4,5,4,4,5,0,2,4,2,2,1,1,0,2,1],
	[2,3,3,4,1,2,4,2,2,2,0,4,1,1,1,4,2,0,2,4,4,3,0,0,4,5,6,2,6,4,3,2,0,0,3,2,4,0,1,4,3,0,3,6,6,3,3,4,6,3,4,6,4,1,4,4,1,4,1,1,1,2,5,1,0,2,2,6,2,2,1,6,4,5,2,3,3,3,4,1,4,2,0,1,2,3,5,2,1,0,0,0,1,1,3,3,2,0,0],
	[1,3,2,2,4,4,4,3,0,3,2,0,1,2,3,2,3,3,1,4,3,1,2,5,2,4,0,2,3,2,3,5,0,1,4,2,1,5,6,6,2,0,0,3,2,5,5,6,6,3,3,2,3,3,0,4,2,3,0,3,5,3,0,4,6,0,3,5,2,4,0,1,0,2,0,1,3,3,1,0,4,3,2,3,4,1,4,2,2,4,3,1,4,2,4,0,3,3,3],
	[0,0,3,2,1,3,2,4,3,0,2,0,2,0,3,0,4,4,0,3,5,5,5,0,4,4,1,0,1,2,3,2,2,0,5,1,6,4,5,6,6,1,1,6,2,1,6,2,1,2,3,1,6,0,5,6,5,5,5,4,3,1,2,3,2,1,0,5,0,1,3,3,5,5,5,5,3,3,3,3,3,1,2,3,2,1,4,0,0,2,0,1,4,2,3,1,1,2,3],
	[0,0,0,0,3,2,0,3,0,4,0,2,0,3,3,3,1,5,1,1,3,2,2,0,2,2,5,5,1,4,0,4,1,6,1,1,6,6,4,6,6,2,6,6,3,5,2,5,1,4,4,3,0,3,5,6,2,1,6,1,4,2,3,5,1,3,1,3,3,3,2,5,1,3,0,4,3,1,5,3,4,3,2,3,3,0,3,0,3,3,3,2,2,2,1,2,3,1,3],
	[1,0,1,2,1,1,3,2,4,1,2,0,3,2,2,3,3,3,3,5,5,0,5,5,0,0,1,0,3,5,5,1,5,2,2,1,6,3,0,5,3,2,5,2,6,6,3,3,0,4,2,0,0,3,4,2,1,4,4,2,1,5,5,1,4,4,1,2,0,4,4,4,2,3,2,1,5,2,5,3,5,0,0,3,2,4,1,2,3,3,4,1,3,0,0,1,0,0,2]
];

$ymax = count($forest);
$xmax = count($forest[0]);

$max_scenic_score = 0;

for ($i = 0; $i < $ymax; $i++)
{
	for ($j = 0; $j < $xmax; $j++)
	{
		echo "LOOP: $i, $j (", $forest[$i][$j], ")\n";

		$score = scenic_score($i, $j);
		$max_scenic_score = max([$score, $max_scenic_score]);

		echo "\tScore is $score\n";
		echo "\tMax is now $max_scenic_score\n\n\n";
	}
}


echo "\n\n$max_scenic_score\n\n\n";

echo "\n\nDone!\n";





// Functions

function is_visible($ty, $tx) 
{
	global $forest;
	$n = $e = $s = $w = array();
	$t = $forest[$ty][$tx];

	for ($i = 0; $i < $ty; $i++)
	{
		array_push($n, $forest[$i][$tx]);
	}
	
	$e = array_slice($forest[$ty], $tx + 1);

	for ($i=$ty + 1; $i < count($forest); $i++)
	{
		array_push($s, $forest[$i][$tx]);
	}

	$w = array_slice($forest[$ty], 0, $tx);

	return max($n) < $t || max($e) < $t || max($s) < $t || max($w) < $t;

}

function scenic_score($ty, $tx) 
{
	global $forest;
	$n = $e = $s = $w = array();
	$t = $forest[$ty][$tx];

	for ($i = 0; $i < $ty; $i++)
	{
		array_push($n, $forest[$i][$tx]);
	}
	$n = array_reverse($n);
	
	$e = array_slice($forest[$ty], $tx + 1);

	for ($i=$ty + 1; $i < count($forest); $i++)
	{
		array_push($s, $forest[$i][$tx]);
	}

	$w = array_reverse(array_slice($forest[$ty], 0, $tx));

	// print_r($n);
	// print_r($e);
	// print_r($s);
	// print_r($w);

	$score = view_value($t, $n) * view_value($t, $e) * view_value($t, $s) * view_value($t, $w);

	return $score;

}

function view_value($t, $view)
{
	$viewing = true;
	$value = 0;
	while ($viewing && $value < count($view))
	{
		if ($view[$value] >= $t) 
		{
			$viewing = false;
		}
		$value++;
	}

	echo "\tVIEW_VALUE of $t and [", join(',', $view), "] is $value\n";
	return $value;
}

?>