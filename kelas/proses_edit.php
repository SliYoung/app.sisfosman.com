<?php

$id_kelas = $_POST ['id_kelas'];
$nama_kelas = $_POST ['nama_kelas'];
$tingkat= $_POST ['tingkat'];
$id_guru= $_POST ['id_guru'];



$query = mysqli_query($koneksi, "UPDATE tb_kelas SET nama_kelas='$nama_kelas',tingkat='$tingkat',id_guru='$id_guru' WHERE id_kelas='$id_kelas'");

if ($query){
    echo "<script>alert('Data Berhasil DiUpdate');window.location.href='?page=kelas/index';</script>";
}else{
    echo "<script>alert('Data Gagal DiUpdate');window.location.href='?page=kelas/edit&id_kelas=$id_kelas';</script>";

}


?>
