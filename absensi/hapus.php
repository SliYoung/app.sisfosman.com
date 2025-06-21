<?php

$id_absensi =$_GET['id_absensi'];
$id_absen_session =$_GET['id_absen_session'];
$query = mysqli_query($koneksi,"DELETE FROM tb_absensi WHERE id_absensi='$id_absensi'");

if ($query){
    echo "<script>alert('Data Berhasil Dihapus');window.location.href='?page=absensi/index&id_absen_session=$id_absen_session';</script>";
}else{
    echo "<script>alert('Data Gagal Dihapus');window.location.href='?page=absensi/index&id_absen_session=$id_absen_session';</script>";

}
?>