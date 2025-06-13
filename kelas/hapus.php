<?php

$id_kelas =$_GET['id_kelas'];
$query = mysqli_query($koneksi,"DELETE FROM tb_kelas WHERE id_kelas='$id_kelas'");

if ($query){
    echo "<script>alert('Data Berhasil Dihapus');window.location.href='?page=kelas/index';</script>";
}else{
    echo "<script>alert('Data Gagal Dihapus');window.location.href='?page=kelas/index';</script>";

}
?>