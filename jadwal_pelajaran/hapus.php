<?php

$id_jadwal_pelajaran =$_GET['id_jadwal_pelajaran'];
$query = mysqli_query($koneksi,"DELETE FROM tb_jadwal_pelajaran WHERE id_jadwal_pelajaran='$id_jadwal_pelajaran'");

if ($query){
    echo "<script>alert('Data Berhasil Dihapus');window.location.href='?page=jadwal_pelajaran/index';</script>";
}else{
    echo "<script>alert('Data Gagal Dihapus');window.location.href='?page=jadwal_pelajaran/index';</script>";

}
?>