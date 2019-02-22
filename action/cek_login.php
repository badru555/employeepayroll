<?php
  require_once "../config/db.php";
  $email = $_POST['email'];
  $password = $_POST['password'];
  // mengenkripsi dengan md5()
  $pass_enkripsi = md5($password);
  // menghindari sql injection
  $injeksi_password = mysqli_real_escape_string($con, $pass_enkripsi);

  if (!ctype_alnum($injeksi_password)) { 
    echo "Sekarang loginnya tidak bisa diinjeksi";
  }
  else{ 
    $query = "SELECT * FROM admin WHERE email='$email' AND password='$injeksi_password'";
    $login = mysqli_query($con, $query);
    $ketemu = mysqli_num_rows($login);
    $r = mysqli_fetch_array($login);



    //jika email dan pss benar
    if($ketemu>0){
      session_start();
      //bikin variabel session_start
      $_SESSION['namauser'] = $r['username'];
      $_SESSION['passuser'] = $r['password'];
      $_SESSION['namalengkap'] = $r['nama_lengkap'];
      $_SESSION['email'] = $r['email'];
      header("location:../index.php");
    }
    else{
      echo "<div id=\"login\"><h1 class=\"fail\">login gagal! username & password salah</h1>";
      echo "<p class=\"fail\"><a href=\"index.php\">ulangi lagi</a></p></div>";
    }
  } 
 ?>
