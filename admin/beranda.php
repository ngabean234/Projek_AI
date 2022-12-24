<?php
if (isset($_SESSION['dojang'])){
  $kode=$_SESSION['dojang'];
  extract(ArrayData($mysqli,"tb_dojang","iddojang='$kode'"));
}

?>
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-12">
        <h1 class="m-0 text-dark">Dashboard</h1>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
          <div class="inner">
           <h3><?=caridata($mysqli,"select count(*) from tb_penyakit")?><sup style="font-size: 20px"></sup></h3>
           <p>Data Penyakit</p>
         </div>
         <div class="icon">
          <i class="fa fa-address-card"></i>
        </div>
        <a href="?hal=penyakit" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-success">
        <div class="inner">
          <h3><?=caridata($mysqli,"select count(*) from tb_gejala")?><sup style="font-size: 20px"></sup></h3>

          <p>Data Gejala</p>
        </div>
        <div class="icon">
          <i class="fa fa-book"></i>
        </div>
        <a href="?hal=gejala" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->

    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-primary">
        <div class="inner">
          <h3><?=caridata($mysqli,"select count(*) from tb_pasien")?><sup style="font-size: 20px"></sup></h3>

          <p>Data Pasien</p>
        </div>
        <div class="icon">
          <i class="fa fa-calendar"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>

    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-warning">
        <div class="inner">
          <?php $tanggal=date('Y-m-d');?>
          <h3><?=caridata($mysqli,"select count(*) from tb_periksa")?><sup style="font-size: 20px"></sup></h3>

          <p>Data Pemeriksaan</p>
        </div>
        <div class="icon">
          <i class="fa fa-id-badge"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->

    <!-- ./col -->
    <!-- ./col -->
  </div>


</section>