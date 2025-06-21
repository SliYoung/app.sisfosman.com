<?php

$id_jadwal_pelajaran= $_POST ['id_jadwal_pelajaran'];
$judul= $_POST ['judul'];
$deskripsi= $_POST ['deskripsi'];
$tanggal= $_POST ['tanggal'];
$deadline= $_POST ['deadline'];

$file =$_FILES['file_tugas']['name'];
$file_tugas = uniqid() . $file;
$namaSementara = $_FILES['file_tugas']['tmp_name'];
$terupload = move_uploaded_file($namaSementara, 'files/' . $file_tugas);


$query = mysqli_query($koneksi, "INSERT INTO tb_tugas (id_jadwal_pelajaran,judul,deskripsi,tanggal,deadline, file_tugas) VALUES ('$id_jadwal_pelajaran','$judul','$deskripsi','$tanggal','$deadline','$file_tugas')");

if ($query){
    echo "<script>alert('Data Berhasil Ditambahkan');window.location.href='?page=tugas/index';</script>";
}else{
    echo "<script>alert('Data Gagal Ditambahkan');window.location.href='?page=tugas/tambah';</script>";

}


?>
