<?php

$id_mapel = $_POST ['id_mapel'];
$nama_mapel = $_POST ['nama_mapel'];


$query = mysqli_query($koneksi, "UPDATE tb_mapel SET nama_mapel='$nama_mapel' WHERE id_mapel='$id_mapel'");

if ($query){
    echo "<script>alert('Data Berhasil DiUpdate');window.location.href='?page=mapel/index';</script>";
}else{
    echo "<script>alert('Data Gagal DiUpdate');window.location.href='?page=mapel/edit&id_mapel=$id_mapel';</script>";

}


?>
