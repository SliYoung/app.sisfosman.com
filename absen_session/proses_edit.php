<?php

$id_absen_session = $_POST ['id_absen_session'];
$id_jadwal_pelajaran= $_POST ['id_jadwal_pelajaran'];
$tanggal= $_POST ['tanggal'];
$jam_buka= $_POST ['jam_buka'];
$jam_tutup= $_POST ['jam_tutup'];
$status_absen_session= $_POST ['status_absen_session'];

$query = mysqli_query($koneksi, "UPDATE tb_absen_session SET id_jadwal_pelajaran='$id_jadwal_pelajaran',tanggal='$tanggal',jam_buka='$jam_buka',jam_tutup='$jam_tutup',status_absen_session='$status_absen_session' WHERE id_absen_session='$id_absen_session'");

if ($query){
    echo "<script>alert('Data Berhasil DiUpdate');window.location.href='?page=absen_session/index';</script>";
}else{
    echo "<script>alert('Data Gagal DiUpdate');window.location.href='?page=absen_session/edit&id_absen_session=$id_absen_session';</script>";

}


?>
