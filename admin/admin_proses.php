<?php
require_once '../setting/crud.php';
require_once '../setting/koneksi.php';
require_once '../setting/tanggal.php';
require_once '../setting/fungsi.php';

if(isset($_POST['tambah']))
{	
//Proses penambahan jk
	$stmt = $mysqli->prepare("INSERT INTO tb_admin 
		(nm_admin,username,password,no_telp,jk) 
		VALUES (?,?,?,?,?)");

	$stmt->bind_param("sssss", 
		mysqli_real_escape_string($mysqli, $_POST['nm_admin']),
		mysqli_real_escape_string($mysqli, $_POST['username']),
		mysqli_real_escape_string($mysqli, $_POST['password']),
		mysqli_real_escape_string($mysqli, $_POST['no_telp']),
		mysqli_real_escape_string($mysqli, $_POST['jk']));	

	if ($stmt->execute()) { 
		setcookie("info","Data admin berhasil disimpan",time() + 2,"/");
		echo "<script>window.location='index.php?hal=admin';</script>";	
	} else {
		setcookie("gagal","Data admin gagal disimpan", time() + 2, "/");
		echo "<script>window.location='javascript:history.go(-1)';</script>";
	}

}else if(isset($_POST['ubah'])){

//Proses ubah data
	$stmt = $mysqli->prepare("UPDATE tb_admin  SET 
		nm_admin=?,
		username=?,
		password=?,
		no_telp=?,
		jk=?
		where id_admin=?");
	$stmt->bind_param("ssssss",
		mysqli_real_escape_string($mysqli, $_POST['nm_admin']),
		mysqli_real_escape_string($mysqli, $_POST['username']),
		mysqli_real_escape_string($mysqli, $_POST['password']),
		mysqli_real_escape_string($mysqli, $_POST['no_telp']),
		mysqli_real_escape_string($mysqli, $_POST['jk']),
		mysqli_real_escape_string($mysqli, $_POST['kode']));	

	if ($stmt->execute()) { 
		setcookie("info","Data admin berhasil diubah",time() + 2,"/");
		echo "<script>window.location='index.php?hal=admin';</script>";	
	} else {
		echo "<script>alert('Data admin Usia Gagal Diubah')</script>";
		echo "<script>window.location='javascript:history.go(-1)';</script>";
	}

}else if(isset($_POST['hapus'])){

	//Proses hapus
	$stmt = $mysqli->prepare("DELETE FROM tb_admin where id_admin=?");
	$stmt->bind_param("s",mysqli_real_escape_string($mysqli, $_POST['hapus'])); 

	if ($stmt->execute()) { 
		setcookie("info","Data admin berhasil dihapus",time() + 2,"/");
		echo "<script>window.location='index.php?hal=admin';</script>";	
	} else {
		echo "<script>alert('Data admin Usia Gagal Dihapus')</script>";
		echo "<script>window.location='javascript:history.go(-1)';</script>";
	}

}
?>