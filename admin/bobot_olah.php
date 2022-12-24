<?php
if (isset($_GET['id'])){
  $kode=$_GET['id'];
  extract(ArrayData($mysqli,"tb_penyakit","id_penyakit='$kode'"));
}
?>

<!-- Main content -->
<section class="content" style="margin-top: 10px;">
  <div class="container-fluid">
    <div class="row">
      <!-- left column -->
      <div class="col-md-6">
        <!-- jquery validation -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Data Penyakit</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form role="form" id="quickForm" action="bobot_proses.php" method="post">

            <div class="card-body">

             <div class="form-group row">
              <label for="nama" class="col-sm-3">Kode Penuakit</label>
              <input type="text" name="id_penyakit" class="form-control col-sm-7" value="<?=$id_penyakit?>" placeholder="Inputkan Kode Gejala" readonly="">
            </div>

            <div class="form-group row">
              <label for="nama" class="col-sm-3">Nama Penyakit</label>
              <input type="text" name="nama_penyakit" class="form-control col-sm-7" value="<?=$nama_penyakit?>" placeholder="Inputkan Penyakit" readonly="">
            </div>

            <div class="form-group row">
              <label for="nama" class="col-sm-3">Gejala</label>
              <select class="form-control select2 col-sm-7" name="id_gejala">
                <?php
                $query="SELECT * from tb_gejala where id_gejala not in (select id_gejala from tb_bobot where id_penyakit='$id_penyakit')";
                $result=$mysqli->query($query);
                $num_result=$result->num_rows;
                if ($num_result > 0 ) { 
                  $no=0;
                  while ($data=mysqli_fetch_assoc($result)) {
                    ?>  
                    <option value="<?=$data['id_gejala']?>"><?=$data['nm_gejala'];?></option>
                  <?php } } ?>
                </select>
              </div>

              <div class="form-group row">
                <label for="nama" class="col-sm-3">Nilai CF</label>
                <select class="form-control select2 col-sm-7" name="id_cf">
                  <?php
                  $query="SELECT * from tb_cf";
                  $result=$mysqli->query($query);
                  $num_result=$result->num_rows;
                  if ($num_result > 0 ) { 
                    $no=0;
                    while ($data=mysqli_fetch_assoc($result)) {
                      ?>  
                      <option value="<?=$data['nilai_cf']?>"><?=$data['nm_cf'];?></option>
                    <?php } } ?>
                  </select>
                </div>

              </div>

              <!-- /.card-body -->
              <div class="card-footer">
                <input type="submit" name="tambah" 
                class="btn btn-primary" value="Simpan">
                <a href="?hal=gejala" class="btn btn-default">
                  Batal
                </a>
              </div>
            </form>
          </div>
          <!-- /.card -->
        </div>

        <div class="col-md-6">
          <!-- jquery validation -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Gejala Penyakit</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Kode</th>
                    <th>Nama Gejala</th>
                    <th>Niali CF</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php

                  $query="SELECT * from tb_gejala join tb_bobot using(id_gejala) where id_penyakit='$id_penyakit'";
                  $result=$mysqli->query($query);
                  $num_result=$result->num_rows;
                  if ($num_result > 0 ) { 
                    $no=0;
                    while ($data=mysqli_fetch_assoc($result)) {
                      extract($data);
                      ?>
                      <tr>
                        <td width="5%"><?php echo $no+=1; ?></td>
                        <td><?php echo $id_gejala; ?></td>
                        <td><?php echo $nm_gejala; ?></td>
                        <td><?php echo $bobot; ?></td>
                        <td width="20%">
                          <a class="btn btn-danger" title="Hapus Data" href="bobot_proses.php?hapus=<?php echo $id_bobot;?>" 
                            onclick="return confirm('Apakah anda yakin akan menghapus data ini?')"> <i class="fa fa-trash"></i></a>

                          </td>
                        </tr>
                      <?php }} ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <!-- /.card -->
          </div>
          <!--/.col (left) -->

          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </section>
<!-- /.content -->