<?php
$data = [2,3,4,5,6];
function hitung($data)
{
	$count = [];
	for ($i=0; $i < count($data); $i++) { 
		$nilai = 0;
		$temp = [];
		for ($x=0; $x < count($data); $x++) { 
			if ($x !== $i) {
				$nilai += $data[$x];
				$temp[$x] = $data[$x];
			}
		}
		$count[$i] = $nilai;
	}
	echo "Nilai Terkecil = ".min($count)."<br> Nilai Terbesar = ".max($count);
}
hitung($data);