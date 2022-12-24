<?php
require_once '../setting/crud.php';
require_once '../setting/koneksi.php';
require_once '../setting/tanggal.php';
require_once '../setting/fungsi.php';

if(isset($_POST['tambah']))
{	
//Proses penambahan gejala
	$stmt = $mysqli->prepare("INSERT INTO tb_gejala 
		(id_gejala,nm_gejala) 
		VALUES (?,?)");

	$stmt->bind_param("ss", 
		mysqli_real_escape_string($mysqli, $_POST['id_gejala']),
		mysqli_real_escape_string($mysqli, $_POST['nm_gejala']));	

	if ($stmt->execute()) { 
		echo "<script>alert('Data gejala Berhasil Disimpan')</script>";
		echo "<script>window.location='index.php?hal=gejala';</script>";	
	} else {
		echo "<script>alert('Data gejala Gagal Disimpan')</script>";
		echo "<script>window.location='javascript:history.go(-1)';</script>";
	}

}else if(isset($_POST['ubah'])){

//Proses ubah data
	$stmt = $mysqli->prepare("UPDATE tb_gejala  SET 
		nm_gejala=?
		where id_gejala=?");
	$stmt->bind_param("ss",
		mysqli_real_escape_string($mysqli, $_POST['nm_gejala']),
		mysqli_real_escape_string($mysqli, $_POST['id_gejala']));	

	if ($stmt->execute()) { 
		echo "<script>alert('Data gejala Berhasil Diubah')</script>";
		echo "<script>window.location='index.php?hal=gejala';</script>";	
	} else {
		echo "<script>alert('Data gejala Gagal Diubah')</script>";
		echo "<script>window.location='javascript:history.go(-1)';</script>";
	}

}else if(isset($_GET['hapus'])){

	//Proses hapus
	$stmt = $mysqli->prepare("DELETE FROM tb_gejala where id_gejala=?");
	$stmt->bind_param("s",mysqli_real_escape_string($mysqli, $_GET['hapus'])); 

	if ($stmt->execute()) { 
		echo "<script>alert('Data gejala Berhasil Dihapus')</script>";
		echo "<script>window.location='index.php?hal=gejala';</script>";	
	} else {
		echo "<script>alert('Data Pegawai Gagal Dihapus')</script>";
		echo "<script>window.location='javascript:history.go(-1)';</script>";
	}

}
?>