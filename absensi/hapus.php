<?php

$id_absensi =$_GET['id_absensi'];
$query = mysqli_query($koneksi,"DELETE FROM tb_absensi WHERE id_absensi='$id_absensi'");

if ($query){
    echo "<script>alert('Data Berhasil Dihapus');window.location.href='?page=absensi/index';</script>";
}else{
    echo "<script>alert('Data Gagal Dihapus');window.location.href='?page=absensi/index';</script>";

}
?>