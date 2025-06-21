<?php

$id_siswa= $_POST ['id_siswa'];
$tanggal= $_POST ['tanggal'];
$statuss= $_POST ['statuss'];
$keterangan= $_POST ['keterangan'];
$id_absen_session= $_POST ['id_absen_session'];


$query = mysqli_query($koneksi, "INSERT INTO tb_absensi (id_siswa,tanggal,statuss,keterangan,id_absen_session) VALUES ('$id_siswa','$tanggal','$statuss','$keterangan','$id_absen_session')");

if ($query){
    if ($_SESSION['role'] == 'siswa') {
        echo "<script>alert('Absen Berhasil Diambil');window.location.href='?page=absensi/absen';</script>";
    }
    echo "<script>alert('Data Berhasil Ditambahkan');window.location.href='?page=absensi/index';</script>";
}else{
    echo "<script>alert('Data Gagal Ditambahkan');window.location.href='?page=absensi/tambah';</script>";

}


?>
