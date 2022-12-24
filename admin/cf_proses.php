<?php
require_once '../setting/crud.php';
require_once '../setting/koneksi.php';
require_once '../setting/tanggal.php';
require_once '../setting/fungsi.php';

if(isset($_POST['tambah']))
{	
//Proses penambahan cf
	$stmt = $mysqli->prepare("INSERT INTO tb_cf 
		(nm_cf,nilai_cf) 
		VALUES (?,?)");

	$stmt->bind_param("ss", 
		mysqli_real_escape_string($mysqli, $_POST['nm_cf']),
		mysqli_real_escape_string($mysqli, $_POST['nilai_cf']));	

	if ($stmt->execute()) { 
		echo "<script>alert('Data cf Berhasil Disimpan')</script>";
		echo "<script>window.location='index.php?hal=cf';</script>";	
	} else {
		echo "<script>alert('Data cf Gagal Disimpan')</script>";
		echo "<script>window.location='javascript:history.go(-1)';</script>";
	}

}else if(isset($_POST['ubah'])){

//Proses ubah data
	$stmt = $mysqli->prepare("UPDATE tb_cf  SET 
		nm_cf=?,
		nilai_cf=?
		where id_cf=?");
	$stmt->bind_param("sss",
		mysqli_real_escape_string($mysqli, $_POST['nm_cf']),
		mysqli_real_escape_string($mysqli, $_POST['nilai_cf']),
		mysqli_real_escape_string($mysqli, $_POST['id_cf']));	

	if ($stmt->execute()) { 
		echo "<script>alert('Data cf Berhasil Diubah')</script>";
		echo "<script>window.location='index.php?hal=cf';</script>";	
	} else {
		echo "<script>alert('Data cf Gagal Diubah')</script>";
		echo "<script>window.location='javascript:history.go(-1)';</script>";
	}

}else if(isset($_GET['hapus'])){

	//Proses hapus
	$stmt = $mysqli->prepare("DELETE FROM tb_cf where id_cf=?");
	$stmt->bind_param("s",mysqli_real_escape_string($mysqli, $_GET['hapus'])); 

	if ($stmt->execute()) { 
		echo "<script>alert('Data cf Berhasil Dihapus')</script>";
		echo "<script>window.location='index.php?hal=cf';</script>";	
	} else {
		echo "<script>alert('Data Pegawai Gagal Dihapus')</script>";
		echo "<script>window.location='javascript:history.go(-1)';</script>";
	}

}
?>