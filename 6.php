<?php
function buyEgg($tgl, $uang)
{
	$harga_telur = 2500;
	$jml_telur_seharusnya = $uang / $harga_telur;
	$bonus_telur = 0;
	$jml_telur_seluruhnya = 0;
	for ($i=1; $i <= 31; $i++) { 
		$a = 0;
		for ($x=1; $x <= $i; $x++) { 
			if ($i % $x == 0) {
				$a++;
			}
		}
		if ($i % 2 == 1) {
			if ($a == 2) {
				if ($tgl == $i) {
					$bonus_telur = round($jml_telur_seharusnya / 12) * 2;
					$jml_telur_seluruhnya = $jml_telur_seharusnya + $bonus_telur;
				}
			} elseif($tgl == $i) {
				$bonus_telur = round($jml_telur_seharusnya / 12) * 3;
				$jml_telur_seluruhnya = $jml_telur_seharusnya + $bonus_telur;
				if ($i % 5 == 0) {
					if ($bonus_telur % 2 == 0) {
						$bonus_telur = $bonus_telur * 10;
						$jml_telur_seluruhnya = $jml_telur_seharusnya + $bonus_telur;
					} else {
						$bonus_telur = $bonus_telur * 5;
						$jml_telur_seluruhnya = $jml_telur_seharusnya + $bonus_telur;
					}
				}
			} 
		}
	}
	echo "Tanggal Beli = $tgl <br>";
	echo "Jumlah Uang = $uang <br>";
	echo "Jumlah Telur Seharusnya = $jml_telur_seharusnya <br>";
	echo "Bonus Telur = $bonus_telur <br>";
	echo "Jumlah Telur Yang Didapat = $jml_telur_seluruhnya <br>";
}
buyEgg(25, 60000);