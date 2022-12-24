<?php
require_once '../setting/crud.php';
require_once '../setting/koneksi.php';
require_once '../setting/tanggal.php';
require_once '../setting/fungsi.php';

if(isset($_POST['tambah']))
{	
//Proses penambahan penyakit
	$stmt = $mysqli->prepare("INSERT INTO tb_penyakit 
		(id_penyakit,nama_penyakit,definisi,pengobatan) 
		VALUES (?,?,?,?)");

	$stmt->bind_param("ssss", 
		mysqli_real_escape_string($mysqli, $_POST['id_penyakit']),
		mysqli_real_escape_string($mysqli, $_POST['nama_penyakit']),
		mysqli_real_escape_string($mysqli, $_POST['definisi']),
		mysqli_real_escape_string($mysqli, $_POST['pengobatan']));	

	if ($stmt->execute()) { 
		echo "<script>alert('Data penyakit Berhasil Disimpan')</script>";
		echo "<script>window.location='index.php?hal=penyakit';</script>";	
	} else {
		echo "<script>alert('Data penyakit Gagal Disimpan')</script>";
		echo "<script>window.location='javascript:history.go(-1)';</script>";
	}

}else if(isset($_POST['ubah'])){

//Proses ubah data
	$stmt = $mysqli->prepare("UPDATE tb_penyakit  SET 
		nama_penyakit=?,
		definisi=?,
		pengobatan=?
		where id_penyakit=?");
	$stmt->bind_param("ssss",
		mysqli_real_escape_string($mysqli, $_POST['nama_penyakit']),
		mysqli_real_escape_string($mysqli, $_POST['definisi']),
		mysqli_real_escape_string($mysqli, $_POST['pengobatan']),
		mysqli_real_escape_string($mysqli, $_POST['id_penyakit']));	

	if ($stmt->execute()) { 
		echo "<script>alert('Data penyakit Berhasil Diubah')</script>";
		echo "<script>window.location='index.php?hal=penyakit';</script>";	
	} else {
		echo "<script>alert('Data penyakit Gagal Diubah')</script>";
		echo "<script>window.location='javascript:history.go(-1)';</script>";
	}

}else if(isset($_GET['hapus'])){

	//Proses hapus
	$stmt = $mysqli->prepare("DELETE FROM tb_penyakit where id_penyakit=?");
	$stmt->bind_param("s",mysqli_real_escape_string($mysqli, $_GET['hapus'])); 

	if ($stmt->execute()) { 
		echo "<script>alert('Data penyakit Berhasil Dihapus')</script>";
		echo "<script>window.location='index.php?hal=penyakit';</script>";	
	} else {
		echo "<script>alert('Data Pegawai Gagal Dihapus')</script>";
		echo "<script>window.location='javascript:history.go(-1)';</script>";
	}

}
?>