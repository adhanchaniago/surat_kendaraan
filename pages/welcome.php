<style type="text/css">
    .search{
        width: 80% !important;
    }
     .filter{
        width: 20% !important;
    }
  div.dataTables_wrapper div.dataTables_filter input {

    width: 100% !important;
    float: left !important;
    margin-left: 0px !important;

}
div.dataTables_wrapper div.dataTables_length select {

    height: 46px !important;
    float: left !important;
    width: 100% !important;

}
div.dataTables_wrapper div.dataTables_length label {
   min-width: 100% !important;
   
}
label {

    min-width: 100% !important;
    }
</style>

 <div class="slider-wrapper">
        <div class="slider">
            <div class="fs_loader"></div>

        <div class="slide">

                <img src="./images/fraction-slider/base_1.png" width="1920" height="auto" data-in="fade" data-out="fade" />

                <p class="slide-heading" data-position="130,380" data-in="top"  data-out="left" data-ease-in="easeOutBounce" data-delay="700">Selamat Datang Di Website </p>

                <p class="sub-line" data-position="230,380" data-in="right" data-out="left" data-delay="1500">Masa Berlaku Surat Kendaraan Pertamina</p>

              
            </div>

            

                <div class="slide">
                <img src="./images/fraction-slider/base_2.png" width="1920" height="auto" data-in="fade" data-out="fade" />

                <p class="slide-heading" data-position="130,380" data-in="top"  data-out="top" data-ease-in="easeOutBounce" data-delay="1500">Kerja Keras</p>

                <p class="sub-line" data-position="225,380" data-in="right" data-out="left"  data-delay="1500">Adalah Energi Kita</p>

            </div>


               <div class="slide">
                <img src="./images/fraction-slider/base_3.png"  width="1920" height="auto" data-in="fade" data-out="fade" />

                <p class="slide-heading" data-position="130,370" data-in="top" data-out="top" data-ease-in="easeOutBounce" data-delay="1500">Kerja Keras</p>

                <p class="sub-line" data-position="230,370" data-in="right" data-out="left" data-delay="2500">Atau Inovasi Serta Kontribusi</p>
 
               
            </div>
            
        
        </div>

    </div>

    <section class="content blog">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                        <div class="blog_medium">
                            <div class="row">
                         <table class="table table-striped" id="example1">
                            <thead>
                              <tr>
                                <th width="5%"></th>

                                <th width="10%">Nomor Polisi</th>
                               <th width="10%">Sopir</th>
                               <th width="10%">TGL Tera</th>
                               <th width="10%">TGL Stnk</th>
                               <th width="10%">TGL Keur</th>
                               <th width="10%">No Pas</th>
                               <th width="10%">Status</th>
                              </tr>
                            </thead>
                            <tbody>
                                  <?php
                                              include "./koneksi/koneksi.php";    
                                
                                            $sql7=mysqli_query($koneksi,"SELECT * FROM tb_masa_berlaku,tb_sopir where tb_sopir.kd_sopir=tb_masa_berlaku.kd_sopir");

                                              while($q7=mysqli_fetch_array($sql7)){

                                             ?>
                              <tr>
                                <td></td>
                               <td>
                                    <br>
                               <p><b><?php echo $q7['no_polisi']; ?></b></p>
                                </td>
                               <td>
                                    <br>
                               <p><?php echo $q7['nm_sopir']; ?></p>
                                </td>
                                <td>
                                    <br>
                               <p> <?php echo date("d F Y",strtotime($q7['tgl_tera'])); ?></p>
                                </td>
                                <td>
                                    <br>
                               <p><?php echo date("d F Y",strtotime($q7['tgl_stnk'])); ?></p>
                                </td>
                                <td>
                                    <br>
                               <p><?php echo date("d F Y",strtotime($q7['tgl_keur'])); ?></p>
                                </td>
                               <td>
                                    <br>
                               <p><?php echo $q7['no_pas']; ?></p>
                                </td>
                                <td>
                                    <br>
                               <p> <?php
                            date_default_timezone_set("Asia/Jakarta");
                            $awal=date_create();
                            $akhir=date_create($q7['tgl_stnk']);
                            $diff=date_diff($awal,$akhir);
                            $bts=$diff->d;

                            if(date('Y-m-d') > date($q7['tgl_stnk'])){

                              echo"<label class='label label-danger'> Tidak Aktif </label>";

                            }elseif($bts <=7){

                                 echo"<label class='label label-warning'> H - ".$bts." </label>";

                            }else{

                                echo "<label class='label label-success'> Aktif </label>";
                            }

                            ?></p>
                                </td>
                              </tr>
                              <?php } ?>
                            </tbody>

                          </table>
                         

                            </div>

                        </div>
                   
                    </div>

                </div><!--/.row-->
            </div> <!--/.container-->
        </section>
