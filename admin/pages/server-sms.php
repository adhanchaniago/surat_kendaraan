
 <?php
session_start();

$isLoggedIn = $_SESSION['isLoggedIn'];
$id=$_SESSION['id'];
$lev=$_SESSION['lev'];
 
if($isLoggedIn != 'yes'){
 
    header('Location: ../../login/login.php');
}
?>
<!DOCTYPE html>

<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8">
    <meta content='10' http-equiv='refresh'/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <link rel="shortcut icon" href="../../images/logo.png"/>


    <title>SERVER SMS</title>
   
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../css/font-awesome.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../../css/skins/_all-skins.min.css">
     <!-- jQuery 2.1.4 -->
    <script src="../../js/jquery-1.10.2.min.js"></script>

   
  </head>
  
  <body class="hold-transition skin-blue sidebar-mini">
    
    <div class="wrapper">
          <div class="logo">
            <img src="../../images/logo.png" class="img-logo">
            <span class="jd-logo">PT Pertamina Persero TBBM</span>
            <span class="nm-sek"></span>
        </div>
 
      <!-- Left side column. contains the logo and sidebar -->


 <section class="content-header">
          <h1>
            Server SMS
            <small></small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="index.php"> Home</a></li>
            <li class="active">Server SMS</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Small boxes (Stat box) -->


          <div class="row">
            <div class="col-lg-12 col-xs-12">
                <center>
            <h3>SERVER SEDANG BERJALAN</h3>
            <p><i>Harap jangan tutup halaman ini</i>.</p>
            <i class="fa fa-refresh fa-spin" style="font-size:30px"></i>
                </center>
                <?php

                include '../../koneksi/koneksi.php'; 

              
         $sql=mysqli_query($koneksi,"SELECT * FROM tb_masa_berlaku,tb_sopir where tb_sopir.kd_sopir=tb_masa_berlaku.kd_sopir");
                      while($q=mysqli_fetch_array($sql)){

                         date_default_timezone_set("Asia/Jakarta");
                            $awal=date_create();
                            $akhir=date_create($q['tgl_stnk']);
                            $diff=date_diff($awal,$akhir);
                            $bts=$diff->d;

                            $tgls=date('Y-m-d');

                            if($tgls < date($q['tgl_stnk'])){

                            
                             $telp=$q['telp'];
                            $pesan="MASA BELAKU SURAT KENDARAAN DENGAN NO POLISI ".$q['no_polisi']." SUDAH HAMPIR HABIS, HARAP LAKUKAN PERPANJANGAN MASA AKTIF SEBELUM TANGGAL ".date('d-m-Y',strtotime($q['tgl_stnk'])).". TERIMAKASIH";

                            $cek1=mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM outbox WHERE DestinationNumber='$telp' and SendingDateTime like '$tgls%'"));

                             $cek2=mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM sentitems WHERE DestinationNumber='$telp' and SendingDateTime like '$tgls%'"));

                                if(empty($cek1) and empty($cek2) and $bts==7){

                                   $query=mysqli_query($koneksi,"INSERT INTO outbox (DestinationNumber,
    TextDecoded) VALUES ('".$telp."', '".$pesan."')");  

                                }

                  
                         }elseif($tgls == date($q['tgl_stnk'])){

                             $telp=$q['telp'];
                            $pesan="MASA BELAKU SURAT KENDARAAN DENGAN NO POLISI ".$q['no_polisi']." HABIS HARI INI, HARAP LAKUKAN PERPANJANGAN MASA AKTIFNYA. TERIMAKASIH";

                            $cek1=mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM outbox WHERE DestinationNumber='$telp' and SendingDateTime like '$tgls%'"));

                             $cek2=mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM sentitems WHERE DestinationNumber='$telp' and SendingDateTime like '$tgls%'"));

                                if(empty($cek1) and empty($cek2)){

                                   $query=mysqli_query($koneksi,"INSERT INTO outbox (DestinationNumber,
    TextDecoded) VALUES ('".$telp."', '".$pesan."')");  

                                }

                         }elseif($tgls > date($q['tgl_stnk'])){

                            date_default_timezone_set("Asia/Jakarta");
                            $awal=date_create();
                            $akhir=date_create($q['tgl_stnk']);
                            $diff=date_diff($awal,$akhir);
                            $bts=$diff->d;

                             $telp=$q['telp'];
                             $pesan="MASA BELAKU SURAT KENDARAAN DENGAN NO POLISI ".$q['no_polisi']." TELAH HABIS DARI TANGGAL ".date('d-m-Y',strtotime($q['tgl_stnk'])).", HARAP LAKUKAN PERPANJANGAN MASA AKTIF. TERIMAKASIH";

                            $cek1=mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM outbox WHERE DestinationNumber='$telp' and SendingDateTime like '$tgls%'"));

                             $cek2=mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM sentitems WHERE DestinationNumber='$telp' and SendingDateTime like '$tgls%'"));

                                if(empty($cek1) and empty($cek2) and $bts==7){

                                   $query=mysqli_query($koneksi,"INSERT INTO outbox (DestinationNumber,
    TextDecoded) VALUES ('".$telp."', '".$pesan."')");  

                                }

                         }

                      }
   
               

                ?>
            </div><!-- ./col -->
          </div><!-- /.row -->


        </section><!-- /.content -->
      </div>

    <script src="../../js/bootstrap.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../js/appLTE.min.js"></script>

  </body>
</html>
    