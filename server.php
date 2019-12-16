<?php

$server = "localhost";
$username = "root";
$password = "";
$database = "perpus";

$con = mysqli_connect($server,$username,$password) or die ("<h1> Koneksi Mysql Error : </h1>".mysqli_connect_error());
mysqli_select_db($con,$database) or die("<h1>Koneksi ke database Error : </h1>".mysqli_connect_error($con));

@$operasi = $_GET['operasi'];

switch($operasi) {

	// Bagian Kategori

	case "view_kategori":

	$query_tampil_kategori = mysqli_query($con,"SELECT * FROM kategori") or die (mysqli_error($con));
	$data_array = array();

	while ($data = mysqli_fetch_assoc($query_tampil_kategori)) {
		$data_array[]= $data;
	}
	echo json_encode($data_array);

	break;

	case "insert_kategori":
	@$kategori = $_GET['kategori'];

	$query_insert_data = mysqli_query($con,"INSERT INTO kategori (kategori) values ('$kategori')");

	if($query_insert_data) {
		echo "Sobat BSI Data Berhasil Disimpan";
	}
	else {
		echo "Sobat BSI Maaf Insert ke Dalam Database Error".mysqli_error($con);
	}

	break;

	case "get_kategori_by_id":
	$id = (int)$_GET['id_kategori'];
	$query_tampil_kategori = mysqli_query($con,"SELECT * FROM kategori WHERE id_kategori='$id'") or die (mysqli_error($con));
	$data_array = array();
	$data_array = mysqli_fetch_assoc($query_tampil_kategori);
	echo "[".json_encode($data_array)."]";
	break;

	case "update_kategori":
	@$kategori = $_GET['kategori'];
	@$id = $_GET['id_kategori'];

	$query_update_kategori = mysqli_query($con,"UPDATE kategori SET kategori='$kategori' WHERE id_kategori='$id'");

	if($query_update_kategori){
		echo "Sobat BSI Update Data Berhasil";
	}
	else {
		echo mysqli_error($con);
	}
	break;

	case "delete_kategori":
	@$id = $_GET['id_kategori'];
	$query_delete_kategori = mysqli_query($con,"DELETE FROM kategori WHERE id_kategori='$id'");
	if ($query_delete_kategori){
		echo "Sobat BSI Data Berhasil Dihapus";
	}
	else {
		echo mysqli_error($con);
	}
	break;

	// Tutorial Pembuatan JSON pada PHP Admin
	// Tegar Prasetyo , 12173378 , 12.5G.01

	case "view_admin":

	$query_tampil_admin = mysqli_query($con,"SELECT * FROM admin") or die (mysqli_error($con));
	$data_array = array();

	while ($data = mysqli_fetch_assoc($query_tampil_admin)) {
		$data_array[]= $data;
	}
	echo json_encode($data_array);

	break;

	case "get_admin_by_id":
	$id = (int)$_GET['id_admin'];
	$query_tampil = mysqli_query($con,"SELECT * FROM admin WHERE id_admin='$id'") or die (mysqli_error($con));
	$data_array = array();
	$data_array = mysqli_fetch_assoc($query_tampil);
	echo "[".json_encode($data_array)."]";
	break;

	case "insert_admin":
	@$nama_admin = $_GET['nama_admin'];
	@$username = $_GET['username'];
	@$password = md5($_GET['password']);

	$query_insert_data = mysqli_query($con,"INSERT INTO admin (nama_admin,username,password) values ('$nama_admin','$username','$password')");

	if($query_insert_data) {
		echo "Sobat BSI Data Berhasil Disimpan";
	}
	else {
		echo "Sobat BSI Maaf Insert ke Dalam Database Error".mysqli_error($con);
	}

	break;

	case "update_admin":
	@$nama_admin = $_GET['nama_admin'];
	@$username = $_GET['username'];
	@$password = md5($_GET['password']);
	@$id = $_GET['id_admin'];

	$query_update_admin = mysqli_query($con,"UPDATE admin SET nama_admin='$nama_admin',username='$username',password='$password' WHERE id_admin='$id'");

	if($query_update_admin){
		echo "Sobat BSI Update Data Berhasil";
	}
	else {
		echo mysqli_error($con);
	}
	break;

	case "delete_admin":
	@$id = $_GET['id_admin'];
	$query_delete_admin = mysqli_query($con,"DELETE FROM admin WHERE id_admin='$id'");
	if ($query_delete_admin){
		echo "Sobat BSI Data Berhasil Dihapus";
	}
	else {
		echo mysqli_error($con);
	}
	break;

	// Tutorial Pembuatan JSON pada PHP Anggota
	// Tegar Prasetyo

	case "view_anggota":

	$query_tampil = mysqli_query($con,"SELECT * FROM anggota") or die (mysqli_error($con));
	$data_array = array();

	while ($data = mysqli_fetch_assoc($query_tampil)) {
		$data_array[]= $data;
	}
	echo json_encode($data_array);

	break;

	case "insert_anggota":
	@$nama_anggota = $_GET['nama_anggota'];
	@$gender = $_GET['gender'];
	@$no_telp = $_GET['no_telp'];
	@$alamat = $_GET['alamat'];
	@$email = $_GET['email'];
	@$password = md5($_GET['password']);

	$query_insert_data = mysqli_query($con,"INSERT INTO anggota (nama_anggota,gender,no_telp,alamat,email,password) values ('$nama_anggota','$gender','$no_telp','$alamat','$email','$password')");

	if($query_insert_data) {
		echo "Sobat BSI Data Berhasil Disimpan";
	}
	else {
		echo "Sobat BSI Maaf Insert ke Dalam Database Error".mysqli_error($con);
	}

	break;

	case "get_anggota_by_id":
	$id = (int)$_GET['id_anggota'];
	$query_tampil = mysqli_query($con,"SELECT * FROM anggota WHERE id_anggota='$id'") or die (mysqli_error($con));
	$data_array = array();
	$data_array = mysqli_fetch_assoc($query_tampil);
	echo "[".json_encode($data_array)."]";
	break;

	case "update_anggota":
	@$nama_anggota = $_GET['nama_anggota'];
	@$gender = $_GET['gender'];
	@$no_telp = $_GET['no_telp'];
	@$alamat = $_GET['alamat'];
	@$email = $_GET['email'];
	@$password = md5($_GET['password']);
	@$id = $_GET['id_anggota'];

	$query_update = mysqli_query($con,"UPDATE anggota SET nama_anggota='$nama_anggota',gender='$gender',no_telp='$no_telp',alamat='$alamat',email='$email',password='$password' WHERE id_anggota='$id'");

	if($query_update){
		echo "Sobat BSI Update Data Berhasil";
	}
	else {
		echo mysqli_error($con);
	}
	break;

	case "delete_anggota":
	@$id = $_GET['id_anggota'];
	$query_delete = mysqli_query($con,"DELETE FROM anggota WHERE id_anggota='$id'");
	if ($query_delete){
		echo "Sobat BSI Data Berhasil Dihapus";
	}
	else {
		echo mysqli_error($con);
	}
	break;

	// Tutorial Pembuatan JSON pada PHP Buku
	// Tegar Prasetyo

	case "view_buku":

	$query_tampil = mysqli_query($con,"SELECT * FROM buku") or die (mysqli_error($con));
	$data_array = array();

	while ($data = mysqli_fetch_assoc($query_tampil)) {
		$data_array[]= $data;
	}
	echo json_encode($data_array);

	break;

	case "get_buku_by_id":
	$id = (int)$_GET['id_buku'];
	$query_tampil = mysqli_query($con,"SELECT * FROM buku WHERE id_buku='$id'") or die (mysqli_error($con));
	$data_array = array();
	$data_array = mysqli_fetch_assoc($query_tampil);
	echo "[".json_encode($data_array)."]";
	break;

	case "insert_buku":
	@$judul_buku = $_GET['judul_buku'];
	@$pengarang = $_GET['pengarang'];
	@$thn_terbit = $_GET['thn_terbit'];
	@$penerbit = $_GET['penerbit'];
	@$isbn = $_GET['isbn'];
	@$jumlah_buku = $_GET['jumlah_buku'];
	@$lokasi = $_GET['lokasi'];
	@$tgl_input = $_GET['tgl_input'];

	$query_insert_data = mysqli_query($con,"INSERT INTO buku (judul_buku,pengarang,thn_terbit,penerbit,isbn,jumlah_buku,lokasi,tgl_input) values ('$judul_buku','$pengarang','$thn_terbit','$penerbit','$isbn','$jumlah_buku','$lokasi','$tgl_input')");

	if($query_insert_data) {
		echo "Sobat BSI Data Berhasil Disimpan";
	}
	else {
		echo "Sobat BSI Maaf Insert ke Dalam Database Error".mysqli_error($con);
	}

	break;

	case "update_buku":
	@$judul_buku = $_GET['judul_buku'];
	@$pengarang = $_GET['pengarang'];
	@$thn_terbit = $_GET['thn_terbit'];
	@$penerbit = $_GET['penerbit'];
	@$isbn = $_GET['isbn'];
	@$jumlah_buku = $_GET['jumlah_buku'];
	@$lokasi = $_GET['lokasi'];
	@$tgl_input = $_GET['tgl_input'];
	@$id = $_GET['id_buku'];

	$query_update = mysqli_query($con,"UPDATE buku SET judul_buku='$judul_buku',pengarang='$pengarang',thn_terbit='$thn_terbit',penerbit='$penerbit',isbn='$isbn',jumlah_buku='$jumlah_buku',lokasi='$lokasi',tgl_input='$tgl_input' WHERE id_buku='$id'");

	if($query_update){
		echo "Sobat BSI Update Data Berhasil";
	}
	else {
		echo mysqli_error($con);
	}
	break;

	case "delete_buku":
	@$id = $_GET['id_buku'];
	$query_delete = mysqli_query($con,"DELETE FROM buku WHERE id_buku='$id'");
	if ($query_delete){
		echo "Sobat BSI Data Berhasil Dihapus";
	}
	else {
		echo mysqli_error($con);
	}
	break;

	default;
	break;
}
