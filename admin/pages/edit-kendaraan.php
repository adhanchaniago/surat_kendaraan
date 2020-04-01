<!-- DIbuat oleh Nopen rianto
Tanggal 08-02-2018 -->

    <div class="content-wrapper">
  <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Edit Kendaraan
            
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
                  <h3 class="box-title">Form Edit Kendaraan</h3>
                 
                </div><!-- /.box-header -->
                <div class="box-body">
                <?php 
                            include '../koneksi/koneksi.php';

                            $id=$_GET['id'];

                            if(isset($_POST['b1'])){

                            if(empty($_POST['kd']) or empty($_POST['merk'])){

                            echo '<div class="alert alert-warning alert-dismissible fade in" role="alert">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">×</span></button>
                                  <strong>Error!</strong> Data tidak boleh ada yang kosong.
                                  </div>';

                            }else{

                              if($_FILES['ft']['name']==""){

                                  $nmf=$_POST['ft_lama'];

                              }else{

                                  $tmpf=$_FILES['ft']['tmp_name'];
                                  $nmf=$_FILES['ft']['name'];
                             
                                  move_uploaded_file($tmpf,"../images/mobil/".$nmf);
                                }
                              
                                $sql=mysqli_query($koneksi,"UPDATE tb_kendaraan SET merk='$_POST[merk]',no_mesin='$_POST[nm]',no_chasasis='$_POST[mch]',th_pembuatan='$_POST[th]',kapasitas='$_POST[kp]',produk='$_POST[pro]',jenis_pola='$_POST[pola]',kd_perusahaan='$_POST[pru]',foto='$nmf' WHERE no_polisi='$id'");
                                

                                 echo '<div class="alert alert-success alert-dismissible fade in" role="alert">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">×</span></button>
                                  <strong>Sukses!</strong> Data berhasil diedit.
                                  </div>';
                            }
                            }
                            ?>
              <div class="col-lg-6">

                     <form id="contactForm" action="" method="post" enctype="multipart/form-data">
                      <?php 
                        
                        $q=mysqli_fetch_array(mysqli_query($koneksi,"SELECT * FROM tb_kendaraan where no_polisi='$id'"));
                      ?>
                     <div class="row">
                                <div class="form-group">
                                    <div class="col-md-12">
                                     <label>Nomor Polisi</label>
                                        <input type="text" name="kd" class="form-control" maxlength="100" value="<?php echo $q['no_polisi']; ?>" placeholder="Nomor Polisi" readonly>
                                    </div>
                                      
                                </div>
                            </div>
                            <br>
                           
                            <div class="row">
                                <div class="form-group">
                                <div class="col-lg-12 ">
                                <label>Merk</label>
                                   <input type="text" name="merk" class="form-control" maxlength="100" value="<?php echo $q['merk']; ?>" placeholder="Merek">
                                      </div>
                                     
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="form-group">
                                <div class="col-lg-12 ">
                                <label>Nomor Mesin</label>
                                   <input type="text" name="nm" class="form-control" maxlength="100" value="<?php echo $q['no_mesin']; ?>" placeholder="Nomor Mesin">
                                      </div>
                                     
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="form-group">
                                <div class="col-lg-12 ">
                                <label>Nomor Chasasis</label>
                                   <input type="text" name="mch" class="form-control" maxlength="100" value="<?php echo $q['no_chasasis']; ?>" placeholder="Nomor Chasasis">
                                      </div>
                                     
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="form-group">
                                <div class="col-lg-12 ">
                                <label>Tahun Pembuatan</label>
                                   <input type="text" name="th" class="form-control" maxlength="100" value="<?php echo $q['th_pembuatan']; ?>" placeholder="Tahun">
                                      </div>
                                     
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="form-group">
                                <div class="col-lg-12 ">
                                <label>Kapasitas</label>
                                   <input type="text" name="kp" class="form-control" maxlength="100" value="<?php echo $q['kapasitas']; ?>" placeholder="Kapasitas">
                                      </div>
                                     
                                </div>
                            </div>
                            <br>
                             <div class="row">
                                <div class="form-group">
                                <div class="col-lg-12 ">
                                <label>Produk</label>
                                   <input type="text" name="pro" class="form-control" maxlength="100" value="<?php echo $q['produk']; ?>" placeholder="Produk">
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
                                      <option value="Pola Tarif" <?php if($q['jenis_pola']=="Pola Tarif"){ echo "Selected"; }else{ echo ""; } ?>>Pola Tarif</option>
                                       <option value="Pola Sewa" <?php if($q['jenis_pola']=="Pola Sewa"){ echo "Selected"; }else{ echo ""; } ?>>Pola Sewa</option>
                                        <option value="Pola Industri" <?php if($q['jenis_pola']=="Pola Industri"){ echo "Selected"; }else{ echo ""; } ?>>Pola Industri</option>
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
                      while($qr=mysqli_fetch_array($sql)){
                     ?>
                     <option value="<?php echo $qr['kd_perusahaan'] ?>" <?php if($q['kd_perusahaan']==$qr['kd_perusahaan']){ echo "Selected"; }else{ echo ""; } ?>><?php echo $qr['nm_perusahaan'] ?></option>
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
                                <br>
                                <img src="./../images/mobil/<?php echo $q['foto']; ?>" alt="" style="width: 100px;height: 100px;">
                                <input type="hidden" name="ft_lama" value="<?php echo $q['foto']; ?>">
                                   <input type="file" name="ft" class="form-control" maxlength="100" placeholder="Foto">
                                      </div>
                                     
                                </div>
                            </div>
                            <br>
                           
                         
                         
                           <div class="row">
                                <div class="col-md-12">
                                    <button type="submit" name="b1" class="btn btn-success"><i class="fa fa-save"></i> Edit Kendaraan</button>
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