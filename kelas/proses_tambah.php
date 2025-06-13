<?php

$nama_kelas= $_POST ['nama_kelas'];
$tingkat= $_POST ['tingkat'];
$id_guru= $_POST ['id_guru'];



$query = mysqli_query($koneksi, "INSERT INTO tb_kelas(nama_kelas,tingkat,id_guru) VALUES ('$nama_kelas','$tingkat','$id_guru')");

if ($query){
    echo "<script>alert('Data Berhasil Ditambahkan');window.location.href='?page=kelas/index';</script>";
}else{
    echo "<script>alert('Data Gagal Ditambahkan');window.location.href='?page=kelas/tambah';</script>";

}


?>
