 <?php
session_start();

$isLoggedIn = $_SESSION['isLoggedIn'];
$id=$_SESSION['id'];
$lev=$_SESSION['lev'];
 
if($isLoggedIn != 'yes'){
 
    header('Location: ../login/login.php');
}
?>
<!DOCTYPE html>

<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <link rel="shortcut icon" href="../images/logo.png"/>


    <title> PT Pertamina Persero TBBM</title>
   
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">

    <link rel="stylesheet" href="../css/bootstrap-datetimepicker.min.css"/>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../css/font-awesome.css">

    <link rel="stylesheet" type="text/css" href="../css/datatables.min.css"/>

    <!-- Theme style -->
    <link rel="stylesheet" href="../css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../css/skins/_all-skins.min.css">
     <!-- jQuery 2.1.4 -->
    <script src="../js/jquery-1.10.2.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <!-- Bootstrap 3.3.5 -->
      <script src="../js/moment.js"></script>

     <script src="../js/bootstrap-datetimepicker.min.js"></script>
   
  </head>
  
  <body class="hold-transition skin-blue sidebar-mini">
     <?php
     include '../koneksi/koneksi.php';
       $qus=mysqli_query($koneksi,"SELECT * FROM tb_admin where kd_admin='$id'");
       $us=mysqli_fetch_array($qus);
     ?>
    <div class="wrapper">
          <div class="logo">
            <img src="../images/logo.png" class="img-logo">
            <span class="jd-logo">PT Pertamina Persero TBBM</span>
            <span class="nm-sek"></span>
        </div>
      <header class="main-header">
        <!-- Logo -->
        <div href="#" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b></b></span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b><?php echo $lev; ?></b></span>
        </div>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
        

              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="../images/user/<?php echo $us['foto']; ?>" class="user-image" alt="User Image">
                  <span class="hidden-xs"><?php echo $us['nama']; ?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="../images/user/<?php echo $us['foto']; ?>" class="img-circle" alt="User Image">
                    <p>
                      <?php echo $us['nama']; ?>
                      <small><?php echo $lev; ?></small>
                    </p>
                  </li>
                  <!-- Menu Body -->
                  <li class="user-body">
                 
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                        <a href="index.php?p=dataProfil" class="btn btn-default btn-flat"><i class="fa fa-user"> Profil</i></a>
                    </div>
                    <div class="pull-right">
                      
                      <a href="../logout/logout.php" class="btn btn-default btn-flat">
                        <i class="fa fa-sign-out"></i> Keluar
                      </a>
                     
                    </div>
                  </li>
                </ul>
              </li>
           
            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar" style="margin-top: 60px;">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar" style="">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="../images/user/<?php echo $us['foto']; ?>" class="img-rounded" alt="User Image">
            </div>
            <div class="pull-left info">
              <p><?php echo $us['nama']; ?></p>
              <a href="#"><i class="fa fa-users text-success"></i> <?php echo $lev; ?></a>
            </div>
          </div>
       
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
           
            <li class="treeview" style="border-top: 1px solid #c8c8cb !important;  ">
              <a href="index.php">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
            </li>
            
            <?php if($lev=="Administrator"){ ?> 

               <li class="treeview">
              <a href="./pages/server-sms.php" target="_blank">
                <i class="fa fa-refresh"></i> <span>Jalankan Server SMS</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
            </li>

            <li class="treeview">
              <a href="#">
                <i class="fa fa-credit-card"></i>
                <span>Masa Berlaku</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="index.php?p=tambah-masaberlaku"><i class="fa fa-circle-o"></i> Tambah Masa berlaku </a></li>
                <li><a href="index.php?p=list-masaberlaku"><i class="fa fa-circle-o"></i> List Semua Masa berlaku</a></li>
                 <li><a href="index.php?p=list-masaberlaku-habis"><i class="fa fa-circle-o"></i> Masa Berlaku Tdk Aktif</a></li>
                 <li><a href="index.php?p=list-masaberlaku-aktif"><i class="fa fa-circle-o"></i> Masa Berlaku Aktif</a></li>
                  <li><a href="index.php?p=list-masaberlaku-mendekati"><i class="fa fa-circle-o"></i> Masa Berlaku YG Mendekati</a></li>
                <li><a href="index.php?p=laporan-masaberlaku"><i class="fa fa-circle-o"></i> Laporan Masa Berlaku</a></li>

              </ul>
            </li>
          
            <li class="treeview">
              <a href="#">
                <i class="fa fa-users"></i>
                <span>Sopir</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                 <li><a href="index.php?p=tambah-sopir"><i class="fa fa-circle-o"></i> Tambah Sopir </a></li>
                <li><a href="index.php?p=list-sopir"><i class="fa fa-circle-o"></i> List Sopir</a></li>
                <li><a href="index.php?p=laporan-sopir"><i class="fa fa-circle-o"></i> Laporan Sopir</a></li>
              </ul>
            </li>

           <li class="treeview">
              <a href="#">
                <i class="fa fa-truck"></i>
                <span>Kendaraan</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="index.php?p=tambah-kendaraan"><i class="fa fa-circle-o"></i> Tambah Kendaraan </a></li>
                <li><a href="index.php?p=list-kendaraan"><i class="fa fa-circle-o"></i> List Kendaraan</a></li>
                <li><a href="index.php?p=laporan-kendaraan"><i class="fa fa-circle-o"></i> Laporan Kendaraan</a></li>
              </ul>
            </li>
          <li class="treeview">
              <a href="#">
                <i class="fa fa-building-o"></i>
                <span>Perusahaan</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="index.php?p=tambah-perusahaan"><i class="fa fa-circle-o"></i> Tambah Perusahaan </a></li>
                <li><a href="index.php?p=list-perusahaan"><i class="fa fa-circle-o"></i> List Perusahaan</a></li>
                <li><a href="index.php?p=laporan-perusahaan"><i class="fa fa-circle-o"></i> Laporan Perusahaan</a></li>
              </ul>
            </li>

            <?php }else{ ?>

               <li class="treeview">
              <a href="#">
                <i class="fa fa-credit-card"></i>
                <span>Masa Berlaku</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
               
                <li><a href="index.php?p=list-masaberlaku"><i class="fa fa-circle-o"></i> List Masa berlaku</a></li>
                <li><a href="index.php?p=laporan-masaberlaku"><i class="fa fa-circle-o"></i> Laporan Masa Berlaku</a></li>

              </ul>
            </li>
          
            <li class="treeview">
              <a href="#">
                <i class="fa fa-users"></i>
                <span>Sopir</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                
                <li><a href="index.php?p=list-sopir"><i class="fa fa-circle-o"></i> List Sopir</a></li>
                <li><a href="index.php?p=laporan-sopir"><i class="fa fa-circle-o"></i> Laporan Sopir</a></li>
              </ul>
            </li>

           <li class="treeview">
              <a href="#">
                <i class="fa fa-truck"></i>
                <span>Kendaraan</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
               
                <li><a href="index.php?p=list-kendaraan"><i class="fa fa-circle-o"></i> List Kendaraan</a></li>
                <li><a href="index.php?p=laporan-kendaraan"><i class="fa fa-circle-o"></i> Laporan Kendaraan</a></li>
              </ul>
            </li>
          <li class="treeview">
              <a href="#">
                <i class="fa fa-building-o"></i>
                <span>Perusahaan</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
             
                <li><a href="index.php?p=list-perusahaan"><i class="fa fa-circle-o"></i> List Perusahaan</a></li>
                <li><a href="index.php?p=laporan-perusahaan"><i class="fa fa-circle-o"></i> Laporan Perusahaan</a></li>
              </ul>
            </li>

            <?php } ?>

          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
     
        <?php
     $page_dir='pages';
    if(!empty($_GET['p'])){
        $page=scandir($page_dir,0);
        unset($page[0],$page[1]);
        $p=$_GET['p'];
        if(in_array($p.'.php',$page)){
         include($page_dir.'/'.$p.'.php');
        }
        else{
        include ($page_dir.'/404-page.php');
        }
    }
    else{
        include ($page_dir.'/home.php');
    }
    ?>

 

      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b></b> 
        </div>
         &copy; Copyright <?php echo date('Y');  ?> Intiphp
      </footer>

      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark" style="top:50px;">
        <!-- Create the tabs -->
        <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
         
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
          <!-- Home tab content -->
          <div class="tab-pane" id="control-sidebar-home-tab">
          </div>
        </div>
      </aside><!-- /.control-sidebar -->
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
  
    </div><!-- ./wrapper -->


     <script type="text/javascript">
      $(function () {
        
        $('#datepicker1').datetimepicker({
                                  
          format: 'YYYY-MM-DD',
           sideBySide: true,
          widgetPositioning: {
              horizontal: 'right',
              vertical: 'bottom'
          }
          
        });

        $('#datepicker2').datetimepicker({

         format: 'YYYY-MM-DD',
           sideBySide: true,
          widgetPositioning: {
              horizontal: 'right',
              vertical: 'bottom'
          }

        });
        
       
         $('#datepicker3').datetimepicker({
                                  
          format:'YYYY-MM-DD',
            sideBySide: true,
          widgetPositioning: {
              horizontal: 'right',
              vertical: 'bottom'
          }
          
        });
       
      
      });
      </script>
    <script src="../js/bootstrap.min.js"></script>

    <script src="../ckeditor/ckeditor.js"></script>
 
    <script type="text/javascript" src="../js/datatables.min.js"></script>

    <!-- AdminLTE App -->
    <script src="../js/appLTE.min.js"></script>

    <script src="../js/backtoTop.js"></script>
 <script>
      $(function () {
        $("#example1").DataTable();
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false
        });
      });
    </script>
  </body>
</html>