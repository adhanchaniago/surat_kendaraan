<!-- DIbuat oleh Nopen rianto
Tanggal 08-02-2018 -->

    <div class="content-wrapper">
  <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Edit Perusahaan
            
          </h1>
          <ol class="breadcrumb">
            <li><a href="home.php"> Home</a></li>
            <li class="active">Perusahaan</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
  <!-- Main row -->
          <div class="row">
            <div class="col-xs-12">

              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Form Edit Perusahaan</h3>
                 
                </div><!-- /.box-header -->
                <div class="box-body">
                <?php 
                            include '../koneksi/koneksi.php';

                            $id=$_GET['id'];

                            if(isset($_POST['b1'])){

                            if(empty($_POST['alm']) or empty($_POST['nm'])){

                            echo '<div class="alert alert-warning alert-dismissible fade in" role="alert">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">×</span></button>
                                  <strong>Error!</strong> Data tidak boleh ada yang kosong.
                                  </div>';

                            }else{

                              
                              
                                $sql=mysqli_query($koneksi,"UPDATE tb_perusahaan SET nm_perusahaan='$_POST[nm]',telp='$_POST[hp]',alamat='$_POST[alm]' WHERE kd_perusahaan='$id'");
                                

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
                        
                        $q=mysqli_fetch_array(mysqli_query($koneksi,"SELECT * FROM tb_perusahaan where kd_perusahaan='$id'"));
                      ?>
                    <div class="row">
                                <div class="form-group">
                                <div class="col-lg-12 ">
                                <label>Nama Perusahaan</label>
                                   <input type="text" name="nm" class="form-control" maxlength="100" value="<?php echo $q['nm_perusahaan']; ?>" placeholder="Nama Perusahaan">
                                      </div>
                                     
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="form-group">
                                <div class="col-lg-12 ">
                                <label>Nomor Telepon</label>
                                   <input type="text" name="hp" class="form-control" maxlength="100" value="<?php echo $q['telp']; ?>" placeholder="Nomor Telepon">
                                      </div>
                                     
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="form-group">
                                <div class="col-lg-12 ">
                                <label>Alamat</label>
                                   <textarea class="form-control" name="alm" placeholder="Alamat"><?php echo $q['alamat']; ?></textarea>
                                      </div>
                                     
                                </div>
                            </div>
                            <br>
                         
                           <div class="row">
                                <div class="col-md-12">
                                    <button type="submit" name="b1" class="btn btn-success"><i class="fa fa-save"></i> Edit Perusahaan</button>
                                    <a href="index.php?p=list-perusahaan" class="btn btn-info"><i class="fa fa-table"></i> List Perusahaan</a>
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