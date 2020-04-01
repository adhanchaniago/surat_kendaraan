  <!-- DIbuat oleh Nopen rianto
Tanggal 08-02-2018 -->

    <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            List Kendaraan
           
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"> Home</a></li>
            <li class="active">List Kendaraan</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
    <!-- Main row -->
          <div class="row">
            <div class="col-xs-12">

              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Data List Kendaraan</h3>  
                </div><!-- /.box-header -->
                <div class="box-body">
                  <div class="table-responsive">     
                  <table id="example1" class="table table-bordered table-striped">
                      
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Foto</th>
                        <th>Nomor Polisi</th>
                        <th>Merk</th>
                        <th>Nomor Mesin</th>
                        <th>Nomor Chasasis</th>
                        <th>Tahun Pembuatan</th>
                        <th>Kapasitas</th>
                        <th>Produk</th>
                        <th>Janis Pola</th>
                        <th>Perusahaan</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                       <?php
                       include './../koneksi/koneksi.php'; 
                      $no=0;
                    $sql=mysqli_query($koneksi,"SELECT * FROM tb_kendaraan,tb_perusahaan Where tb_perusahaan.kd_perusahaan=tb_kendaraan.kd_perusahaan");
                      while($q=mysqli_fetch_array($sql)){
                        $no++;

                     ?>
                      <tr>
                        <td><?php echo $no; ?></td>
                        <td><img src="./../images/mobil/<?php echo $q['foto']; ?>" alt="" style="width: 100px;height: 100px;"></td>
                         
                        <td><?php echo $q['no_polisi']; ?></td>
                        <td><?php echo $q['merk']; ?></td>
                         <td><?php echo $q['no_mesin']; ?></td>
                         <td><?php echo $q['no_chasasis']; ?></td>
                         <td><?php echo $q['th_pembuatan']; ?></td>
                         <td><?php echo $q['kapasitas']; ?></td>
                         <td><?php echo $q['produk']; ?></td>
                         <td><?php echo $q['jenis_pola']; ?></td>
                         <td><?php echo $q['nm_perusahaan']; ?></td>
                         <td>
                          <a href="index.php?p=edit-kendaraan&id=<?php echo $q['no_polisi']; ?>" class="btn btn-success"><i class="fa fa-pencil"></i></a>
                          <a href="./pages/delete-kendaraan.php?id=<?php echo $q['no_polisi']; ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                        </td>
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