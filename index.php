<?php 

session_start();

if($_SESSION == NULL){
   echo "<script>
   alert('Harap Login Terlebih Dahulu')
   window.location.href='auth/login.php'
   </script>";
}

date_default_timezone_set("Asia/Jakarta");

include "koneksi.php";
include "layout/header.php";
include "layout/sidebar.php";
include "layout/navbar.php";
include "content.php";
include "layout/footer.php";

