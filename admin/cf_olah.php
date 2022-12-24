<?php
if (isset($_GET['id'])){
  $kode=$_GET['id'];
  extract(ArrayData($mysqli,"tb_cf","id_cf='$kode'"));
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
            <h3 class="card-title">Olah Data CF</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form role="form" id="quickForm" action="cf_proses.php" method="post">

            <div class="card-body">

            <input type="hidden" name="id_cf" value="<?=@$id_cf;?>">

            <div class="form-group row">
              <label for="nama" class="col-sm-3">Nama CF</label>
              <input type="text" name="nm_cf" class="form-control col-sm-7" value="<?=@$nm_cf?>" placeholder="Inputkan CF" required="">
            </div>

             <div class="form-group row">
              <label for="nama" class="col-sm-3">Nilai CF</label>
              <input type="number" max="1" min="0" step="0.1" name="nilai_cf" class="form-control col-sm-7" value="<?=@$nilai_cf?>" placeholder="Inputkan Nilai CF" required="">
            </div>

          </div>

          <!-- /.card-body -->
          <div class="card-footer">
            <input type="submit" name="<?=isset($_GET['id'])?'ubah':'tambah';?>" 
            class="btn btn-primary" value="Simpan">
            <a href="?hal=cf" class="btn btn-default">
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