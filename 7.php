<?php
$data = [
	['a','b','c','d'],
	['g','e','f']
];
$datalain = [
	['g','h','i','j'],
	['a','b','c','e','d'],
	['g','e','f']
];

function sort_array($data)
{
	for ($i=0; $i < count($data); $i++) { 
		for ($x=$i; $x > 0; $x--) { 
			if ($data[$x] < $data[$x - 1]) {
                $dummy = $data[$x];
                $data[$x] = $data[$x -1];
                $data[$x-1] = $dummy;
            }
		}
	}
	foreach ($data as $key => $value) {
		sort($value);
		echo json_encode($value, JSON_PRETTY_PRINT);
	}
}
sort_array($data);