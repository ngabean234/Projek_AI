<?php
if (isset($_GET['id'])){
  $kode=$_GET['id'];
  extract(ArrayData($mysqli,"tb_admin","id_admin='$kode'"));
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
            <h3 class="card-title">Olah Data Admin</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form role="form" id="quickForm" action="admin_proses.php" method="post">

            <div class="card-body">

              <input type="hidden" name="kode" value="<?=@$id_admin?>">

              <div class="form-group row">
                <label for="nama"  class="form-label col-sm-3">Nama Admin</label>
                <input type="text" name="nm_admin" class="form-control col-sm-8" value="<?=@$nm_admin?>" placeholder="Inputkan Nama Admin" required="">
              </div>

              <div class="form-group row">
                <label for="nama" class="form-label col-sm-3">Username</label>
                <input type="text" name="username" class="form-control col-sm-8" value="<?=@$username?>" placeholder="Inputkan Username" required="">
              </div>

              <div class="form-group row">
                <label for="nama" class="form-label col-sm-3">Password</label>
                <input type="text" name="password" class="form-control col-sm-8" value="<?=@$password?>" placeholder="Inputkan Password" required="">
              </div>

              <div class="form-group row">
                <label for="nama" class="form-label col-sm-3">No Telepon</label>
                <input type="number" name="no_telp" class="form-control col-sm-8" value="<?=@$no_telp?>" placeholder="Inputkan No Telepon" required="">
              </div>

              <div class="form-group row">
                <label for="nama" class="col-sm-3">Jenis Kelamin</label>
                <select class="form-control select2 col-sm-4" name="jk">
                  <option value="L">L</option>
                  <option value="P">P</option>
                </select>
              </div>

            </div>

            <!-- /.card-body -->
            <div class="card-footer">
              <input type="submit" name="<?=isset($_GET['id'])?'ubah':'tambah';?>" 
              class="btn btn-primary" value="Simpan">
              <a href="?hal=admin" class="btn btn-default">
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