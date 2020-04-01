<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
     <link rel="shortcut icon" href="./images/logo.png"/>

    <title> PT Pertamina Persero TBBM </title>

    <!-- Styles -->
    <link href="./css/app.css" rel="stylesheet">

    <!-- CSS FILES -->
    <link rel="stylesheet" href="./css/bootstrap.min.css"/>
    <link rel="stylesheet" href="./css/style-guest.css">
<link rel="stylesheet" type="text/css" href="./css/datatables.min.css"/>
    <link rel="stylesheet" href="./css/fractionslider.css"/>
    <link rel="stylesheet" href="./css/style-fraction.css"/>
     <link rel="stylesheet" href="./css/font-awesome.css">


</head>
<body>
<!--Start Header-->
<header id="header">
    <div id="top-bar">
        <div class="container">
            <div class="row">
                <div class="col-sm-7 top-info">
                  
                    <span><i class="fa fa-phone"></i>Telepon: (0751) 751001</span>
                    <span><i class="fa fa-envelope"></i>Email: pcc@pertamina.com</span>
                   
                </div>
               
            </div>
        </div>
    </div>
    <!-- LOGO bar -->
    <div id="logo-bar">
        <!-- Container -->
        <div class="container">
            <div class="row">
                <!-- Logo / Mobile Menu -->
                <div class="col-md-12">
                    <div id="logo">
                        <img src="./images/logo.png">
                        <h1>PT Pertamina (Persero) TBBM</h1>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container / End -->
    </div>
    <!--LOGO bar / End-->

    <!-- Navigation
================================================== -->
    <div class="navbar navbar-default navbar-static-top" role="navigation">
    <div class="container">
       
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
           <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li style="border-left: 1px solid #96999C;"><a href="index.php?p=welcome">Home</a></li>
                        <li><a href="index.php?p=kontak">Kontak</a></li>
                    </ul>
                     <ul class="nav navbar-nav navbar-right sm">
                       <li><a href="./login/login.php">Login Admin</a></li>
                    </ul>
                   
                </div>
       
       </div><!--/.container -->
    </div>
</header>
<!--End Header-->
 
<!--start wrapper-->
<section class="wrapper">

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
        include ($page_dir.'/welcome.php');
    }
    ?>

</section><!--end wrapper-->

<!--start footer-->
<footer class="footer">
    <div class="container">
        <div class="row">
           
          
            <div class="col-sm-6 col-md-6 col-lg-6">
                <div class="widget_title">
                    <h4><span>List Masa Berlaku</span></h4>

                </div>
                <div class="widget_content">
                    <ul class="links">
                          <?php
                   
                    $sql2=mysqli_query($koneksi,"SELECT * FROM tb_masa_berlaku ORDER BY tgl_stnk ASC LIMIT 3");
                    while($q2=mysqli_fetch_array($sql2)){
                    ?>
                        <li> <a href="#"><b><?php echo $q2['no_polisi'] ?></b><span><?php echo date('d F Y',strtotime($q2['tgl_stnk'])); ?></span></a></li>
                        <?php } ?>
                        
                    </ul>
                </div>
                <div class="widget_content">
                    <div class="tweet_go"></div>
                </div>
            </div>
             <div class="col-sm-6 col-md-6 col-lg-6">
                <div class="widget_title">
                    <h4><span>Kontak</span></h4>
                </div>
                <div class="widget_content">
                    <p>Jika anda ingin mengunjungi atau menghubungi kami silahkan melalui kontak dibawah ini.</p>
                 
                    <ul class="contact-details-alt">
                        <li><i class="fa fa-map-marker"></i> <p><strong>Address</strong>: Jln.Padang Painan Km 24, Padang Sumbar</p></li>
                        <li><i class="fa fa-user"></i> <p><strong>Telepon</strong>: (0751) 751001</p></li>
                        <li><i class="fa fa-envelope"></i> <p><strong>Email</strong>: pcc@pertamina.com</p></li>
                    </ul>
                    
                </div>
            </div>
        </div>
    </div>
</footer>
<!--end footer-->
<section class="footer_bottom">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 ">
                <p class="copyright"> &copy; Copyright <?php echo date('Y');  ?> Intiphp</p>
            </div>

         
        </div>
    </div>
</section>
<script src="./js/app.js"></script>
<script src="./js/jquery-1.10.2.min.js"></script>

<script type="text/javascript" src="./js/datatables.min.js"></script>
<script src="./js/jquery.fractionslider.js" type="text/javascript" charset="utf-8"></script>

<script type="text/javascript" src="./js/jquery.isotope.min.js"></script>

<script src="./js/backtoTop.js"></script>
<script>
      $(function () {
        $("#example1").DataTable();
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": true,
          "ordering": true,
          "info": true,
          "autoWidth": false
        });
      });
    </script>
<script>
    $(window).load(function(){
        $('.slider').fractionSlider({
            'fullWidth':            true,
            'controls':             true,
            'responsive':           true,
            'dimensions':           "1920,450",
            'timeout' :             5000,
            'increase':             true,
            'pauseOnHover':         true,
            'slideEndAnimation':    false,
            'autoChange':           true
        });
    });
</script>

</body>
</html>


