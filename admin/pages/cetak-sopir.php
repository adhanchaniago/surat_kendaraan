<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <link rel="shortcut icon" href="../../images/logo.png"/>
   <link rel="stylesheet" href="../../css/bootstrap.min.css">

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Cetak</title>
</head>

<style type="text/css" media="print">

    .table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
    padding: 5px;
    line-height: 0.9;

}
</style>
<style type="text/css" media="screen">
    .table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
    padding: 5px;
    line-height: 0.9;


}
</style>

<body onload="window.print();">
     <table style="width: 100%">
        <tr>
          <td width="80%"> 
            <h4><b>PT PERTAMINA (PERSERO) TBBM TELUK KABUNG</b></h4>
    <p>Jln. Padang Painan KM 24, Padang Sumatera Barat ,Telp: (0751)751001 , Fax : (0751)751009</p></td>
          <td width="20%">
          <img src="../../images/logo.png" alt="" style="width:130px;height:70px;float: right;">
   

          </td>
        </tr>

    </table>

  <div style="width:100%;float: left;">
 <div style="border-bottom: 2px solid #555;padding:10px 0;margin-bottom: 20px;"></div>
  <center>LAPORAN DATA SOPIR</center>
 <center>Periode Bulan <b><?php echo date('F Y'); ?></b></center>
 <br>
  </div>

  <div style="width: 100%;float: left">
      <table id="example1" class="table table-bordered table-striped">
                      
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Telepon</th>
                        
                        <th>Jenis Kelamin</th>
                        <th>Alamat</th>
                 
                      
                      </tr>
                    </thead>
                    <tbody>
                       <?php
                       include '../../koneksi/koneksi.php'; 
                      $no=0;
                    $sql=mysqli_query($koneksi,"SELECT * FROM tb_sopir");
                      while($q=mysqli_fetch_array($sql)){
                        $no++;

                     ?>
                      <tr>
                        <td><?php echo $no; ?></td>
                         <td><?php echo $q['nm_sopir']; ?></td>
                         <td><?php echo $q['telp']; ?></td>
                        <td><?php echo $q['jk']; ?></td>
                        <td><?php echo $q['alamat']; ?></td>
                  
                        
                      </tr>

                  <?php } ?>
                    </tbody>
                  </table>
  </div>
<div class="ttd" style="float: right;">
  Padang, <?php echo date("d F Y"); ?><br>

  <br>
  <br>
  <br>
<div style="border-bottom: 1px solid #555">Titis Bayu Amarta Tanjung</div>
Nip : 751714
</div>
</body>
</html>
