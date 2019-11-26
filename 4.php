<?php
// Hitung sesuai voucher yang digunakan
function dumbWaysAsik()
{
	$potongan = [20000, (40 / 100)];
	return $potongan;
}
function dumbWaysMantap()
{
	$potongan = [50000,(30 / 100)];
	return $potongan;
}
function hitungvoucher($voucher, $uang)
{
	$output = 0;
	$hasil = 0;
	$kembalian = 0;
	switch ($voucher[0]) {
		case '20000':
			if ($uang < 20000) {
				echo "Maaf minimal belanja harus Rp.20000";
				die();
			} else {
				$hasil = $voucher[1] * $uang;
				if ($hasil >= 20000) {
					$output = 20000;
					$kembalian = $uang - $output;
				} else {
					$output = $hasil;
					$kembalian = $uang - $output;
				}
			}
			break;
		case '50000':
			if ($uang < 40000) {
				echo "Maaf minimal belanja harus Rp.40000";
				die();
			} else {
				$hasil = $voucher[1] * $uang;
				if ($hasil >= 40000) {
					$output = 40000;
					$kembalian = $uang - $output;
				} else {
					$output = $hasil;
					$kembalian = $uang - $output;
				}
			}
			break;
		default:
			# code...
			break;
	}
	echo "Selamat voucher kamu dapat digunakan <br>";
	echo "Uang Yang Harus Dibayar : $output <br>";
	echo "Diskon : $output <br>";
	echo "Kembalian : $kembalian <br>";

}


hitungvoucher(dumbWaysAsik(), 20000);
