<?php

$id_guru =$_GET['id_guru'];
$query = mysqli_query($koneksi,"DELETE FROM tb_guru WHERE id_guru='$id_guru'");

if ($query){
    echo "<script>alert('Data Berhasil Dihapus');window.location.href='?page=guru/index';</script>";
}else{
    echo "<script>alert('Data Gagal Dihapus');window.location.href='?page=guru/index';</script>";

}
?>