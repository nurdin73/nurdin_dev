<?php
include_once 'koneksi.php';
$name = $_POST['name'];
$stok = $_POST['stok'];
$desk = $_POST['desk'];
$category = $_POST['category'];
$img = $_FILES['img']['name'];
$insert = mysqli_query($conn, "INSERT INTO books(name,stock,image,deskripsi,category_id) VALUES ('".$name."','".$stok."','".$img."','".$desk."','".$category."')");
move_uploaded_file($_FILES['img']['tmp_name'], 'img/'.$img);
if ($insert) {
	header('location:index.php');
} else {
	echo "Error";
}