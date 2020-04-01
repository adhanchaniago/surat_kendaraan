<!-- DIbuat oleh Nopen rianto
Tanggal 08-02-2018 -->

<?php
session_start();
include './../koneksi/koneksi.php';
    $username = $_POST['user'];
    $password = md5($_POST['pas']);
    $level = $_POST['level'];
    $sql = "SELECT * FROM tb_admin WHERE username='".$username."' AND password='".$password."' AND level='".$level."'";
    $query = mysqli_query($koneksi,$sql) or die (mysqli_error());
        $row = mysqli_num_rows($query);
        // jika $row > 0 atau username dan password ditemukan
        if($row > 0){
            $cid=mysqli_fetch_array($query);
            $_SESSION['id']=$cid['kd_admin'];
            $_SESSION['isLoggedIn']='yes';
            $_SESSION['lev']=$level;
            header('Location: ../admin');
        }else{
          echo "<script type='text/javascript'>
		alert('Username Atau Password Anda Salah..!');
	</script>";
	echo "<script> window.history.back(); </script>";

        }
?>