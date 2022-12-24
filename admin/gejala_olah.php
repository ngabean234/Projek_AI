<?php
if (isset($_GET['id'])){
  $kode=$_GET['id'];
  extract(ArrayData($mysqli,"tb_gejala","id_gejala='$kode'"));

}else{
  $id_gejala=KodeOtomatis($mysqli,"tb_gejala","id_gejala","G","1","2");
  $nm_gejala="";
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
            <h3 class="card-title">Olah Data gejala</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form role="form" id="quickForm" action="gejala_proses.php" method="post">

            <div class="card-body">

             <div class="form-group row">
              <label for="nama" class="col-sm-3">Kode Gejala</label>
              <input type="text" name="id_gejala" class="form-control col-sm-7" value="<?=$id_gejala?>" placeholder="Inputkan Kode Gejala" readonly="">
            </div>

            <div class="form-group row">
              <label for="nama" class="col-sm-3">Nama Gejala</label>
              <input type="text" name="nm_gejala" class="form-control col-sm-7" value="<?=$nm_gejala?>" placeholder="Inputkan gejala" required="">
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