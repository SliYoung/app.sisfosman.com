<?php

$id_absen_session =$_GET['id_absen_session'];
$query = mysqli_query($koneksi,"DELETE FROM tb_absen_session WHERE id_absen_session='$id_absen_session'");

if ($query){
    echo "<script>alert('Data Berhasil Dihapus');window.location.href='?page=absen_session/index';</script>";
}else{
    echo "<script>alert('Data Gagal Dihapus');window.location.href='?page=absen_session/index';</script>";

}
?>