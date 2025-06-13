<?php

$id_mapel =$_GET['id_mapel'];
$query = mysqli_query($koneksi,"DELETE FROM tb_mapel WHERE id_mapel='$id_mapel'");

if ($query){
    echo "<script>alert('Data Berhasil Dihapus');window.location.href='?page=mapel/index';</script>";
}else{
    echo "<script>alert('Data Gagal Dihapus');window.location.href='?page=mapel/index';</script>";

}
?>