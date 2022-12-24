<?php

// Upload gambar
function UploadImage($fupload_name, $lokasi, $name){
  //direktori gambar
  $vdir_upload = "$lokasi/";
  $vfile_upload = $vdir_upload . $fupload_name;

  //Simpan gambar dalam ukuran sebenarnya
  move_uploaded_file($_FILES["$name"]["tmp_name"], $vfile_upload);

  //identitas file asli
  $im_src = imagecreatefromjpeg($vfile_upload);
  $src_width = imageSX($im_src);
  $src_height = imageSY($im_src);

  //Simpan dalam versi small 110 pixel
  //Set ukuran gambar hasil perubahan
  $dst_width = 150;
  $dst_height = ($dst_width/$src_width)*$src_height;

  //proses perubahan ukuran
  $im = imagecreatetruecolor($dst_width,$dst_height);
  imagecopyresampled($im, $im_src, 0, 0, 0, 0, $dst_width, $dst_height, $src_width, $src_height);

  //Simpan gambar
  imagejpeg($im,$vdir_upload . "small_" . $fupload_name);

  
  //Hapus gambar di memori komputer
  imagedestroy($im_src);
  imagedestroy($im);
}

function UploadFile($fupload_name, $lokasi, $name){
  //direktori gambar
  $vdir_upload = "$lokasi/";
  $vfile_upload = $vdir_upload . $fupload_name;

  //Simpan gambar dalam ukuran sebenarnya
  move_uploaded_file($_FILES["$name"]["tmp_name"], $vfile_upload);

}

function isselect($x,$y){
  if($x==$y){
    echo "selected";
  }else{
    echo "";
  }
}


  function warna($status){
    switch ($status) {
      case 'daftar':
      return "<span class='badge badge-primary'>Daftar</span>";
      break;

      case 'lulus':
      return "<span class='badge badge-success'>Lulus</span>";
      break;

      case 'gagal':
      return "<span class='badge badge-danger'>Gagal</span>";
      break;
      
      default:
        # code...
      break;
    }
  }
?>
