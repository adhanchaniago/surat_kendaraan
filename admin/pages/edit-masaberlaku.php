<!-- DIbuat oleh Nopen rianto
Tanggal 08-02-2018 -->

    <div class="content-wrapper">
  <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Edit Masa Berlaku
            
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
                  <h3 class="box-title">Form Edit Masa Berlaku</h3>
                 
                </div><!-- /.box-header -->
                <div class="box-body">
                <?php 
                            include '../koneksi/koneksi.php';

                            $id=$_GET['id'];

                            if(isset($_POST['b1'])){

                            if(empty($_POST['kd']) or empty($_POST['pru'])){

                            echo '<div class="alert alert-warning alert-dismissible fade in" role="alert">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">×</span></button>
                                  <strong>Error!</strong> Data tidak boleh ada yang kosong.
                                  </div>';

                            }else{

                            
                                $sql=mysqli_query($koneksi,"UPDATE tb_masa_berlaku SET kd_perusahaan='$_POST[pru]',kd_sopir='$_POST[sop]',tgl_tera='$_POST[tera]',tgl_stnk='$_POST[stnk]',tgl_keur='$_POST[keur]',no_pas='$_POST[np]' WHERE no_polisi='$id'");
                                

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
                        
                        $q=mysqli_fetch_array(mysqli_query($koneksi,"SELECT * FROM tb_masa_berlaku where no_polisi='$id'"));
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
                                <label>Perusahaan</label>
                                   <select name="pru" class="form-control">
                                     <option>-Perusahaan-</option>
                                      <?php
                  
                      
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
                                <label>Sopir</label>
                                   <select name="sop" class="form-control">
                                     <option>-Kode Sopir-</option>
                                      <?php
                 
                      
                    $sql=mysqli_query($koneksi,"SELECT * FROM tb_sopir");
                      while($qt=mysqli_fetch_array($sql)){
                     ?>
                     <option value="<?php echo $qt['kd_sopir'] ?>" <?php if($q['kd_sopir']==$qt['kd_sopir']){ echo "Selected"; }else{ echo ""; } ?>><?php echo $qt['nm_sopir'] ?></option>
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
                                   <input type="text" name="tera" class="form-control" maxlength="100" placeholder="Tgl Tera" id="datepicker1" value="<?php echo $q['tgl_tera']; ?>">
                                      </div>
                                     
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="form-group">
                                <div class="col-lg-12 ">
                                <label>TGL Stnk</label>
                                   <input type="text" name="stnk" class="form-control" maxlength="100" value="<?php echo $q['tgl_stnk']; ?>" placeholder="Tgl Stnk" id="datepicker2">
                                      </div>
                                     
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="form-group">
                                <div class="col-lg-12 ">
                                <label>TGL Keur</label>
                                   <input type="text" name="keur" class="form-control" maxlength="100" value="<?php echo $q['tgl_keur']; ?>" placeholder="Tgl Keur" id="datepicker3">
                                      </div>
                                     
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="form-group">
                                <div class="col-lg-12 ">
                                <label>NO Pas</label>
                                   <input type="text" name="np" class="form-control" maxlength="100" value="<?php echo $q['no_pas']; ?>" placeholder="No Pas">
                                      </div>
                                     
                                </div>
                            </div>
                            <br>

                         
                           <div class="row">
                                <div class="col-md-12">
                                    <button type="submit" name="b1" class="btn btn-success"><i class="fa fa-save"></i> Edit Masa Berlaku</button>
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