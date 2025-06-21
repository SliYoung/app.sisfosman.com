<?php

$id_jadwal_pelajaran= $_POST ['id_jadwal_pelajaran'];
$tanggal= $_POST ['tanggal'];
$jam_buka= $_POST ['jam_buka'];
$jam_tutup= $_POST ['jam_tutup'];
$status_absen_session= $_POST ['status_absen_session'];

$query = mysqli_query($koneksi, "INSERT INTO tb_absen_session (id_jadwal_pelajaran,tanggal,jam_buka,jam_tutup,status_absen_session) VALUES ('$id_jadwal_pelajaran','$tanggal','$jam_buka','$jam_tutup','$status_absen_session')");

if ($query){
    echo "<script>alert('Data Berhasil Ditambahkan');window.location.href='?page=absen_session/index';</script>";
}else{
    echo "<script>alert('Data Gagal Ditambahkan');window.location.href='?page=absen_session/tambah';</script>";

}


?>
