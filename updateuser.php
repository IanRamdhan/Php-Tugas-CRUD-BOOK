<?php
//Masukkan koneksi.php agar bisa digunakan
include './config/koneksi.php';

$response = array();

//Cek method apakah POST 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	
	//Mengecek Parameter inputan user
	if (isset($_POST["iduser"]) &&
        isset($_POST["namauser"]) &&
        isset($_POST["alamat"]) && 
		isset($_POST["jenkel"]) &&
		isset($_POST["notelp"])
	){
	//Memasukkan iputan user ke dalam variable 
	$iduser = $_POST["iduser"];
	$namauser = $_POST["namauser"];
	$alamat = $_POST["alamat"];
	$jenkel = $_POST["jenkel"];
	$notelp = $_POST["notelp"];

	//Membuat Query untuk menupdate ke database
	$query = "UPDATE tb_user SET namauser = '$namauser', alamat = '$alamat', jenkel = '$jenkel', notelp = '$notelp'  WHERE id_user = '$iduser'";

	//Mengeksekusi query yang sudah dibuat dan langsung mengecek apakah berhasil atau tidak

	if (mysqli_query($connection, $query)) {
		//apabila behasil maka kita tampilkn response berhasil
		$response["result"] = 1;
		$response["message"] = "Update Berhasil";

	}else{
		$response["result"] = 0;
		$response["message"] = "Update Succes";
	}

	//mengubah response menajdi json
	echo json_encode($response);
}
}

?>