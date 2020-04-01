<div class="content-wrapper">
 <section class="content-header">
          <h1>
            Dashboard
            <small></small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="index.php"> Home</a></li>
            <li class="active">Dashboard</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Small boxes (Stat box) -->


          <div class="row">
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                    <?php
                    include "../koneksi/koneksi.php"; 
                    date_default_timezone_set("Asia/Jakarta");

                    $sql=mysqli_query($koneksi,"SELECT * FROM tb_sopir");
                    $q=mysqli_num_rows($sql);
                    ?>
                  <h3><?php echo $q; ?></h3>
                  <p>Sopir</p>
                </div>
                <div class="icon">
                  <i class="fa fa-users"></i>
                </div>
                <a href="index.php?p=list-sopir" class="small-box-footer">Lihat <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                    <?php

                    $sql2=mysqli_query($koneksi,"SELECT * FROM tb_kendaraan");
                    $q2=mysqli_num_rows($sql2);
                    ?>
                  <h3><?php echo $q2; ?></h3>
                  <p>Kendaraan</p>
                </div>
                <div class="icon">
                  <i class="fa fa-truck"></i>
                </div>
                <a href="index.php?p=list-kendaraan" class="small-box-footer">Lihat <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-yellow">
                <div class="inner">
                  <?php

                    $sql3=mysqli_query($koneksi,"SELECT * FROM tb_perusahaan");
                    $q3=mysqli_num_rows($sql3);
                    ?>
                  <h3><?php echo $q3; ?></h3>
                  <p>Perusahaan</p>
                </div>
                <div class="icon">
                  <i class="fa fa-building-o"></i>
                </div>
                <a href="index.php?p=list-perusahaan" class="small-box-footer">Lihat <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-red">
                <div class="inner">
                  <?php
                   
                    $sql4=mysqli_query($koneksi,"SELECT * FROM tb_masa_berlaku");
                    $q4=mysqli_num_rows($sql4);
                    ?>
                  <h3><?php echo $q4; ?></h3>
                  <p>Masa Berlaku </p>
                </div>
                <div class="icon">
                  <i class="fa fa-credit-card"></i>
                </div>
                <a href="index.php?p=list-masaberlaku" class="small-box-footer">Lihat <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
          </div><!-- /.row -->


        </section><!-- /.content -->
      </div>
