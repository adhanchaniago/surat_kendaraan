<!-- DIbuat oleh Nopen rianto
Tanggal 08-02-2018 -->

    <div class="content-wrapper">
  <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Tambah Masa Berlaku
            
          </h1>
          <ol class="breadcrumb">
            <li><a href="home.php"> Home</a></li>
            <li class="active">Masa Berlaku</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
  <!-- Main row -->
          <div class="row">
            <div class="col-xs-12">

              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Form Masa Berlaku</h3>
                 
                </div><!-- /.box-header -->
                <div class="box-body">
                 <?php 
                            include '../koneksi/koneksi.php';

                            if(isset($_POST['b1'])){

                            if(empty($_POST['kd']) or empty($_POST['pru'])){

                            echo '<div class="alert alert-warning alert-dismissible fade in" role="alert">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">×</span></button>
                                  <strong>Error!</strong> Data tidak boleh ada yang kosong.
                                  </div>';

                            }else{

                           

                                $sql=mysqli_query($koneksi,"INSERT INTO tb_masa_berlaku values ('$_POST[kd]','$_POST[pru]','$_POST[sop]','$_POST[tera]','$_POST[stnk]','$_POST[keur]','$_POST[np]')");
                                
                                if($sql){
                                   echo '<div class="alert alert-success alert-dismissible fade in" role="alert">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">×</span></button>
                                  <strong>Sukses!</strong> Data berhasil ditambah.
                                  </div>';
                                }else{
                                   echo '<div class="alert alert-error alert-dismissible fade in" role="alert">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">×</span></button>
                                  <strong>Sukses!</strong> Data gagal ditambah, Pastikan nomor Polisi yang dimasukan belum ada dilist.
                                  </div>';
                                }
                                
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
                                <label>Perusahaan</label>
                                   <select name="pru" class="form-control">
                                     <option>-Perusahaan-</option>
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
                                <label>Sopir</label>
                                   <select name="sop" class="form-control">
                                     <option>-Kode Sopir-</option>
                                      <?php
                       include './../koneksi/koneksi.php'; 
                      
                    $sql=mysqli_query($koneksi,"SELECT * FROM tb_sopir");
                      while($q=mysqli_fetch_array($sql)){
                     ?>
                     <option value="<?php echo $q['kd_sopir'] ?>"><?php echo $q['nm_sopir'] ?></option>
                   <?php } ?>
                                   </select>
                                      </div>
                                     
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="form-group">
                                <div class="col-lg-12 ">
                                <label>TGL Tera</label>
                                   <input type="text" name="tera" class="form-control" maxlength="100" value="" placeholder="TGL Tera" id="datepicker1">
                                      </div>
                                     
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="form-group">
                                <div class="col-lg-12 ">
                                <label>TGL Stnk</label>
                                   <input type="text" name="stnk" class="form-control" maxlength="100" value="" placeholder="TGL STNK" id="datepicker2">
                                      </div>
                                     
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="form-group">
                                <div class="col-lg-12 ">
                                <label>TGL Keur</label>
                                   <input type="text" name="keur" class="form-control" maxlength="100" value="" placeholder="TGL Keur" id="datepicker3">
                                      </div>
                                     
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="form-group">
                                <div class="col-lg-12 ">
                                <label>NO Pas</label>
                                   <input type="text" name="np" class="form-control" maxlength="100" value="" placeholder="No Pas">
                                      </div>
                                     
                                </div>
                            </div>
                            <br>

                           <div class="row">
                                <div class="col-md-12">
                                    <button type="submit" name="b1" class="btn btn-primary"><i class="fa fa-save"></i> Tambah Masa Berlaku</button>
                                    <a href="index.php?p=list-masaberlaku" class="btn btn-info"><i class="fa fa-table"></i> List Masa Berlaku</a>
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
