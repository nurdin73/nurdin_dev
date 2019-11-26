<?php

function hitungKembalian($total, $uang)
{
	$data = [50000,20000,10000,5000,2000,500];
	$kembalian = $uang - $total;
	$data1 = $kembalian % 50000;
	$a = ($kembalian - $data1) / 50000;
	$data2 = $data1 % 20000;
	$b = ($data1 - $data2) / 20000;
	$data3 = $data2 % 10000;
	$c = ($data2 - $data3) / 10000;
	$data4 = $data3 % 5000;
	$d = ($data3 - $data4) / 5000;
	$data5 = $data4 % 2000;
	$e = ($data4 - $data5) / 2000;
	$data6 = $data5 % 500;
	$f = ($data5 - $data6) / 500;
	echo "Jumlah Rp.50.000 : ".$a."<br>";
    echo "Jumlah Rp.20.000 : ".$b."<br>";
    echo "Jumlah Rp.10.000 : ".$c."<br>";
    echo "Jumlah Rp.5.000 : ".$d."<br>";
    echo "Jumlah Rp.2.000 : ".$e."<br>";
    echo "Jumlah Rp.500 : ".$f."<br>";
}
hitungKembalian(122500, 200000);