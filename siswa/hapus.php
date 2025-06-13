<?php

$id_siswa =$_GET['id_siswa'];
$query = mysqli_query($koneksi,"DELETE FROM tb_siswa WHERE id_siswa='$id_siswa'");

if ($query){
    echo "<script>alert('Data Berhasil Dihapus');window.location.href='?page=siswa/index';</script>";
}else{
    echo "<script>alert('Data Gagal Dihapus');window.location.href='?page=siswa/index';</script>";

}
?>