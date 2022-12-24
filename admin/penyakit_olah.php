<?php
if (isset($_GET['id'])){
  $kode=$_GET['id'];
  extract(ArrayData($mysqli,"tb_penyakit","id_penyakit='$kode'"));

}else{
  $id_penyakit=KodeOtomatis($mysqli,"tb_penyakit","id_penyakit","P","1","2");
  $nama_penyakit="";
  $definisi="";
  $pengobatan="";
}
?>

<!-- Main content -->
<section class="content" style="margin-top: 10px;">
  <div class="container-fluid">
    <div class="row">
      <!-- left column -->
      <div class="col-md-12">
        <!-- jquery validation -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Olah Data Penyakit</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form role="form" id="quickForm" action="penyakit_proses.php" method="post">

            <div class="card-body">

             <div class="form-group row">
              <label for="nama" class="col-sm-3">Kode Gejala</label>
              <input type="text" name="id_penyakit" class="form-control col-sm-7" value="<?=$id_penyakit?>" placeholder="Inputkan Kode Gejala" readonly="">
            </div>

            <div class="form-group row">
              <label for="nama" class="col-sm-3">Nama Gejala</label>
              <input type="text" name="nama_penyakit" class="form-control col-sm-7" value="<?=$nama_penyakit?>" placeholder="Inputkan Penyakit" required="">
            </div>

            <div class="form-group row">
              <label for="nama" class="col-sm-3">Definisi</label>
              <textarea class="form-control col-sm-7" rows="3" name="definisi" placeholder="Isikan Definisi Penyakit" required=""><?=$definisi?></textarea>
            </div>

            <div class="form-group row">
              <label for="nama" class="col-sm-3">Pengobatan</label>
              <textarea class="form-control col-sm-7" rows="3" name="pengobatan" placeholder="Isikan Pengobatan" required=""><?=$pengobatan?></textarea>
            </div>

          </div>

          <!-- /.card-body -->
          <div class="card-footer">
            <input type="submit" name="<?=isset($_GET['id'])?'ubah':'tambah';?>" 
            class="btn btn-primary" value="Simpan">
            <a href="?hal=gejala" class="btn btn-default">
              Batal
            </a>
          </div>
        </form>
      </div>
      <!-- /.card -->
    </div>
    <!--/.col (left) -->
  </div>
  <!-- /.row -->
</div><!-- /.container-fluid -->
</section>
<!-- /.content -->