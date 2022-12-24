<?php
require_once '../setting/crud.php';
require_once '../setting/koneksi.php';
require_once '../setting/tanggal.php';
require_once '../setting/fungsi.php';

if(isset($_POST['tambah']))
{	

//Proses penambahan gejala
	$stmt = $mysqli->prepare("INSERT INTO tb_bobot 
		(id_gejala,id_penyakit,bobot) 
		VALUES (?,?,?)");

	$stmt->bind_param("sss", 
		mysqli_real_escape_string($mysqli, $_POST['id_gejala']),
		mysqli_real_escape_string($mysqli, $_POST['id_penyakit']),
		mysqli_real_escape_string($mysqli, $_POST['id_cf']));	

	if ($stmt->execute()) { 
		echo "<script>alert('Data bobot Berhasil Disimpan')</script>";
		echo "<script>window.location='index.php?hal=bobot_olah&id=".$_POST['id_penyakit']."';</script>";	
	} else {
		echo "<script>alert('Data bobot Gagal Disimpan')</script>";
		echo "<script>window.location='javascript:history.go(-1)';</script>";
	}

}else if(isset($_GET['hapus'])){

	//Proses hapus
	$stmt = $mysqli->prepare("DELETE FROM tb_bobot where id_bobot=?");
	$stmt->bind_param("s",mysqli_real_escape_string($mysqli, $_GET['hapus'])); 

	if ($stmt->execute()) { 
		echo "<script>alert('Data Bobot Berhasil Dihapus')</script>";
		echo "<script>window.location='javascript:history.go(-1)';</script>";
	} else {
		echo "<script>alert('Data Pegawai Gagal Dihapus')</script>";
		echo "<script>window.location='javascript:history.go(-1)';</script>";
	}

}
?>