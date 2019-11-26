<?php
include_once 'koneksi.php';
$id = $_GET['id'];
$data = mysqli_query($conn, "SELECT * FROM books WHERE id='$id'");
if (mysqli_num_rows($data) > 0) {
	$sel = mysqli_fetch_array($data);
	$stock = $sel['stock'] - 1;
	$update = mysqli_query($conn, "UPDATE books SET stock='$stock' WHERE id='$id'");
	if ($update) {
		header('location:index.php');
	} else {
		echo "Error";
	}
}