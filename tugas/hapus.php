<?php

$id_tugas =$_GET['id_tugas'];
$query = mysqli_query($koneksi,"DELETE FROM tb_tugas WHERE id_tugas='$id_tugas'");

if ($query){
    echo "<script>alert('Data Berhasil Dihapus');window.location.href='?page=tugas/index';</script>";
}else{
    echo "<script>alert('Data Gagal Dihapus');window.location.href='?page=tugas/index';</script>";

}
?>