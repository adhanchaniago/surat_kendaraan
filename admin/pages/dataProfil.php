<div class="content-wrapper">
 <section class="content-header">
          <h1>
            Profil Admin
            <small></small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"> Home</a></li>
            <li class="active">Profil</li>
          </ol>
        </section>

    <section class="content">
          <?php 
                         include '../koneksi/koneksi.php';

                           

                            if(isset($_POST['b1'])){

                            if(empty($_POST['id']) or empty($_POST['nm'])){

                            echo '<div class="alert alert-warning alert-dismissible fade in" role="alert">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">×</span></button>
                                  <strong>Error!</strong> Data tidak boleh ada yang kosong.
                                  </div>';

                            }else{

                                  $tmpf=$_FILES['ft']['tmp_name'];
                                  $nmf=$_FILES['ft']['name'];

                                  if(!empty($nmf)){
                                    $ft=$nmf;
                                    move_uploaded_file($tmpf,"../images/user/".$nmf);
                                  }else{
                                    $ft=$_POST['ft_lama'];
                                  }

                                if($_POST['pas_lama']==$_POST['pas']){
                                  $pass=$_POST['pas'];
                                }else{
                                  $pass=md5($_POST['pas']);
                                }
                              
                                $sql=mysqli_query($koneksi,"UPDATE tb_admin SET nama='$_POST[nm]',jekel='$_POST[jekel]',telp='$_POST[telp]',username='$_POST[user]',password='$pass',foto='$ft' where kd_admin='$_POST[id]'");

                                
                            

                                 echo '<div class="alert alert-success alert-dismissible fade in" role="alert">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">×</span></button>
                                  <strong>Sukses!</strong> Data berhasil diedit.
                                  </div>';
                            }
                            }
                            ?>

      <div class="row">
     
        <form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
               
                             <?php 
                       
                        $q=mysqli_fetch_array(mysqli_query($koneksi,"SELECT * FROM tb_admin where kd_admin='$_SESSION[id]'"));
                      ?>
              <img class="profile-user-img img-responsive img-circle" src="../images/user/<?php echo $q['foto']; ?>" alt="User profile picture">

              <h3 class="profile-username text-center"><?php echo $q['nama']; ?></h3>

              <p class="text-muted text-center"></p>
              
              
               
              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                   <input type="file" class="form-control" name="ft" id="foto">
                   <input type="hidden" class="form-control" name="ft_lama" id="foto" value="<?php echo $q['foto']; ?>">
                  
                </li>
                
              </ul>

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

         
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#activity" data-toggle="tab">Biodata</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
             
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Nama</label>

                    <div class="col-sm-10">
                       <input type="hidden" class="form-control" name="id" id="inputName" value="<?php echo $q['kd_admin']; ?>" placeholder="kd">
                      <input type="text" class="form-control" name="nm" id="inputName" value="<?php echo $q['nama']; ?>" placeholder="Name">
                     
                    </div>
                  </div>
                   <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Jenis Kelamin</label>

                    <div class="col-sm-10">
                      
                      <input type="text" class="form-control" name="jekel" id="inputName" value="<?php echo $q['jekel']; ?>" placeholder="jekel">
                     
                    </div>
                  </div>
                   <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Nomor Telepon</label>

                    <div class="col-sm-10">
                     
                      <input type="text" class="form-control" name="telp" id="inputName" value="<?php echo $q['telp']; ?>" placeholder="Name">
                     
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="inputSkills" class="col-sm-2 control-label">Username</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputSkills" name="user" value="<?php echo $q['username']; ?>" placeholder="Username">
                    
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputSkills" class="col-sm-2 control-label">Password</label>

                    <div class="col-sm-10">
                      <input type="password" class="form-control" id="inputSkills" name="pas" value="<?php echo $q['password']; ?>" placeholder="Password">
                      <input type="hidden" class="form-control" id="inputSkills" name="pas_lama" value="<?php echo $q['password']; ?>" placeholder="Password">
                    
                    </div>
                  </div>
                 
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" name="b1" class="btn btn-info">Update</button>
                    </div>
                  </div>
                
              </div>
              
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </form>
      </div>
    
      <!-- /.row -->

    </section>
</div>
