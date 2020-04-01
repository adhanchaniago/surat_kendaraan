  <!-- DIbuat oleh Nopen rianto
Tanggal 08-02-2018 -->

    <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Laporan Masa Berlaku
           
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"> Home</a></li>
            <li class="active">Laporan Masa Berlaku</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
    <!-- Main row -->
          <div class="row">
            <div class="col-xs-12">

              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Data Laporan Masa Berlaku <a href="./pages/cetak-masaberlaku.php" class="btn btn-warning" target="_blank"><i class="fa fa-print"></i> Cetak</a></h3>  
                </div><!-- /.box-header -->
                <div class="box-body">
                  <div class="table-responsive">     
                  <table id="example1" class="table table-bordered table-striped">
                      
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Status</th>
                        <th>Nomor Polisi</th>
                        <th>Perusahaan</th>
                        <th>Sopir</th>
                        <th>TGL Tera</th>
                        <th>TGL Stnk</th>
                        <th>TGL Keur</th>
                        <th>No PAS</th>
                      
                      </tr>
                    </thead>
                    <tbody>
                       <?php
                       include './../koneksi/koneksi.php'; 
                      $no=0;
                    $sql=mysqli_query($koneksi,"SELECT * FROM tb_masa_berlaku,tb_perusahaan,tb_sopir where tb_sopir.kd_sopir=tb_masa_berlaku.kd_sopir and tb_perusahaan.kd_perusahaan=tb_masa_berlaku.kd_perusahaan");
                      while($q=mysqli_fetch_array($sql)){
                        $no++;

                     ?>
                      <tr>
                        <td><?php echo $no; ?></td>
                        <td>
                           <?php
                            date_default_timezone_set("Asia/Jakarta");
                            $awal=date_create();
                            $akhir=date_create($q['tgl_stnk']);
                            $diff=date_diff($awal,$akhir);
                            $bts=$diff->d;

                            if(date('Y-m-d') > date($q['tgl_stnk'])){

                              echo"<label class='label label-danger'> Tidak Aktif </label>";

                            }elseif($bts <=7){

                                 echo"<label class='label label-warning'> H - ".$bts." </label>";

                            }else{

                                echo "<label class='label label-success'> Aktif </label>";
                            }

                            ?>
                        </td>
                        <td><?php echo $q['no_polisi']; ?></td>
                        <td><?php echo $q['nm_perusahaan']; ?></td>
                         <td><?php echo $q['nm_sopir']; ?></td>
                         <td><?php echo $q['tgl_tera']; ?></td>
                         <td><?php echo $q['tgl_stnk']; ?></td>
                         <td><?php echo $q['tgl_keur']; ?></td>
                         <td><?php echo $q['no_pas']; ?></td>
                        
                      </tr>

                  <?php } ?>
                    </tbody>
                  </table>
                </div>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->

            </section><!-- /.content -->
      </div><!-- /.content-wrapper -->