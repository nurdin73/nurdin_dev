<?php
include_once 'koneksi.php';
$name = $_POST['kategori'];
$insert = mysqli_query($conn, "INSERT INTO category(name) VALUES ('".$name."')");
if ($insert) {
	header('location:index.php');
} else {
	echo "Error";
}