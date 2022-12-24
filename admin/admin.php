<?php if(isset($_COOKIE['info'])){ ?>
  <script type="text/javascript">
    let content = "<?php echo $_COOKIE['info']; ?>";
    console.log(content);
    Swal.fire(
      'Berhasil!',
      content,
      'info'
      )
    </script>
  <?php } ?>

  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Data Admin</h1>
        </div><!-- /.col -->
        <div class="col-sm-5">
        </div>
        <div class="col-sm-1">
          <a href="?hal=admin_olah" style="float: right;" class="btn btn-block bg-gradient-primary btn-sm">Tambah</a>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </di=v><!-- /.container-fluid -->
  </div>
</div>
<!-- /.content-header -->

<section class="content">
  <div class="row">
    <div class="col-12">
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title primary">List Data</h3>

          <div class="card-tools">
          </div>

        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example2" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama </th>
                <th>Username</th>
                <th>Password</th>
                <th>No Telepon</th>
                <th>JK</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $query="SELECT * from tb_admin";
              $result=$mysqli->query($query);
              $num_result=$result->num_rows;
              if ($num_result > 0 ) { 
                $no=0;
                while ($data=mysqli_fetch_assoc($result)) {
                  extract($data);
                  ?>
                  <tr>
                    <td width="5%"><?=$no+=1; ?></td>
                    <td><?=$nm_admin; ?></td>
                    <td><?=$username; ?></td>
                    <td><?=$password; ?></td>
                    <td><?=$no_telp; ?></td>
                    <td><?=$jk; ?></td>

                    <td width="15%">
                      <div class="row">

                        <a href="?hal=admin_olah&id=<?=$id_admin; ?>" 
                          class="btn btn-icon" title="Edit Data"><i class="fa fa-edit"></i></a>

                          <form class="form1" action="admin_proses.php" method="POST">
                            <input type="hidden" name="hapus" value="<?=$id_admin?>">
                            <button class="btn" name="hapus" type="submit">
                              <i class="fa fa-trash"></i>
                            </button>
                          </form>
                        </div>
                      </td>
                    </tr>
                  <?php }} ?>
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->

    <div class="modal fade" id="myModal">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Data Pengurus</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div id="fetch-data"></div>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

    <script type="text/javascript">
          //Konfirmasi Delete
  document.querySelector('.form1').addEventListener('submit', function(e) {
            var form = this;

  e.preventDefault(); // <--- prevent form from submitting
  Swal.fire({
    title: "Peringatan",
    text: "Apakah anda yakin akan menghapus data ?",
    type: "warning",
    showCancelButton: true,
    confirmButtonColor: "#DD6B55",
    confirmButtonText: "Ya, hapus!",
    cancelButtonText: "Tidak, batalkan!",
    closeOnConfirm: false,
    closeOnCancel: false

  }).then((result) => {
    if (result.value) {
      form.submit();
    }
  })
});
</script>
