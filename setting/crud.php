<?php
function KodeOtomatis($conn,$tabel, $id, $inisial, $index, $panjang)
{
  $query	= "SELECT max(".$id.") as max_id FROM `".$tabel."` WHERE ".$id." LIKE '".$inisial."%'";
  $data		= $conn->query($query)->fetch_array();
  $id_max	= $data['max_id'];
  
  if($index=='' && $panjang=='')
  {
	$no_urut	= (int) $id_max;
  }else if($index!='' && $panjang==''){
	$no_urut    = (int) substr($id_max, $index);
  }else{
	$no_urut	= (int) substr($id_max, $index, $panjang);
  }
  $no_urut	= $no_urut + 1;
  if($index=='' && $panjang=='')
  {
	  $id_baru  = $no_urut;
  }else if($index!='' && $panjang==''){
	  $id_baru  = $inisial . $no_urut;
  }else{
	  $id_baru	= $inisial . sprintf("%0$panjang"."s", $no_urut);
  }
  return $id_baru;
}

  function DataArray ($mysqli,$qry){
  $query = $qry;
  $result = $mysqli->query($query);
  $num_results = $result->num_rows;
  if($num_results > 0){
    return $result;
  }else{
    return "";
  }
}

  function SingleData($conn,$kolom,$table){
  	$row = $conn->query("SELECT $kolom FROM $table")->fetch_array();
  	return $row[0];
  }

  function ArrayData($conn,$table,$kondisi){
    $row = $conn->query("Select * from $table where $kondisi")->fetch_assoc();
    return $row;
  }

  function JumlahData($conn,$table){
     $row = $conn->query("Select * from $table")->num_rows;
     return $row;
  }

  function lastinsert($conn,$qry){
    $row = $conn->query($qry)->fetch_array();
    return $row[0];
  }

  function CekExist($conn,$qry){
    $row = $conn->query($qry)->num_rows;
    if ($row> 0){
        return true;
    }else{
        return false;
    }

  }
    function caridata($conn,$qry){
    $row = $conn->query($qry)->fetch_array();
    return $row[0];
  }



?>