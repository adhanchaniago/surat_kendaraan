<!-- DIbuat oleh Nopen rianto
Tanggal 08-02-2018 -->

    <div class="content-wrapper">
  <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Tambah Kendaraan
            
          </h1>
          <ol class="breadcrumb">
            <li><a href="home.php"> Home</a></li>
            <li class="active">Kendaraan</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
  <!-- Main row -->
          <div class="row">
            <div class="col-xs-12">

              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Form Kendaraan</h3>
                 
                </div><!-- /.box-header -->
                <div class="box-body">
                 <?php 
                            include '../koneksi/koneksi.php';

                            if(isset($_POST['b1'])){

                            if(empty($_POST['kd']) or empty($_POST['merk'])){

                            echo '<div class="alert alert-warning alert-dismissible fade in" role="alert">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">×</span></button>
                                  <strong>Error!</strong> Data tidak boleh ada yang kosong.
                                  </div>';

                            }else{

                               $tmpf=$_FILES['ft']['tmp_name'];
                              $nmf=$_FILES['ft']['name'];
                              move_uploaded_file($tmpf,"../images/mobil/".$nmf);

                                $sql=mysqli_query($koneksi,"INSERT INTO tb_kendaraan values ('$_POST[kd]','$_POST[merk]','$_POST[nm]','$_POST[mch]','$_POST[th]','$_POST[kp]','$_POST[pro]','$_POST[pola]','$_POST[pru]','$nmf')");
                                

                                 echo '<div class="alert alert-success alert-dismissible fade in" role="alert">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">×</span></button>
                                  <strong>Sukses!</strong> Data berhasil ditambah.
                                  </div>';
                            }
                            }
                            ?>
              <div class="col-lg-6">

                     <form id="contactForm" action="" method="post" enctype="multipart/form-data">
                     <div class="row">
                                <div class="form-group">
                                    <div class="col-md-12">
                                     <label>Nomor Polisi</label>
                                        <input type="text" name="kd" class="form-control" maxlength="100" value="" placeholder="Nomor Polisi">
                                    </div>
                                      
                                </div>
                            </div>
                            <br>
                           
                            <div class="row">
                                <div class="form-group">
                                <div class="col-lg-12 ">
                                <label>Merk</label>
                                   <input type="text" name="merk" class="form-control" maxlength="100" value="" placeholder="Merek">
                                      </div>
                                     
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="form-group">
                                <div class="col-lg-12 ">
                                <label>Nomor Mesin</label>
                                   <input type="text" name="nm" class="form-control" maxlength="100" value="" placeholder="Nomor Mesin">
                                      </div>
                                     
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="form-group">
                                <div class="col-lg-12 ">
                                <label>Nomor Chasasis</label>
                                   <input type="text" name="mch" class="form-control" maxlength="100" value="" placeholder="Nomor Chasasis">
                                      </div>
                                     
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="form-group">
                                <div class="col-lg-12 ">
                                <label>Tahun Pembuatan</label>
                                   <input type="text" name="th" class="form-control" maxlength="100" value="" placeholder="Tahun">
                                      </div>
                                     
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="form-group">
                                <div class="col-lg-12 ">
                                <label>Kapasitas</label>
                                   <input type="text" name="kp" class="form-control" maxlength="100" value="" placeholder="Kapasitas">
                                      </div>
                                     
                                </div>
                            </div>
                            <br>
                             <div class="row">
                                <div class="form-group">
                                <div class="col-lg-12 ">
                                <label>Produk</label>
                                   <input type="text" name="pro" class="form-control" maxlength="100" value="" placeholder="Produk">
                                      </div>
                                     
                                </div>
                            </div>
                            <br>
                             <div class="row">
                                <div class="form-group">
                                <div class="col-lg-12 ">
                                <label>Jenis Pola</label>
                                   <select name="pola" class="form-control">
                                     <option>-Jenis Pola-</option>
                                      <option value="Pola Tarif">Pola Tarif</option>
                                       <option value="Pola Sewa">Pola Sewa</option>
                                        <option value="Pola Industri">Pola Industri</option>
                                   </select>
                                      </div>
                                     
                                </div>
                            </div>
                            <br>
                             <div class="row">
                                <div class="form-group">
                                <div class="col-lg-12 ">
                                <label>Kode Perusahaan</label>
                                   <select name="pru" class="form-control">
                                     <option>-Kode Perusahaan-</option>
                                      <?php
                       include './../koneksi/koneksi.php'; 
                      
                    $sql=mysqli_query($koneksi,"SELECT * FROM tb_perusahaan");
                      while($q=mysqli_fetch_array($sql)){
                     ?>
                     <option value="<?php echo $q['kd_perusahaan'] ?>"><?php echo $q['nm_perusahaan'] ?></option>
                   <?php } ?>
                                   </select>
                                      </div>
                                     
                                </div>
                            </div>
                            <br>
                           <div class="row">
                                <div class="form-group">
                                <div class="col-lg-12 ">
                                <label>Foto</label>
                                   <input type="file" name="ft" class="form-control" maxlength="100" value="" placeholder="Foto">
                                      </div>
                                     
                                </div>
                            </div>
                            <br>
                           
                         
                           <div class="row">
                                <div class="col-md-12">
                                    <button type="submit" name="b1" class="btn btn-primary"><i class="fa fa-save"></i> Tambah Kendaraan</button>
                                    <a href="index.php?p=list-kendaraan" class="btn btn-info"><i class="fa fa-table"></i> List Kendaraan</a>
                                </div>
                            </div>
                        </form>
                  </div>

                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->

     </section><!-- /.content -->

   </div>
