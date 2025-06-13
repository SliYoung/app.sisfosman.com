<?php

$id_siswa= $_POST ['id_siswa'];
$tanggal= $_POST ['tanggal'];
$statuss= $_POST ['statuss'];
$keterangan= $_POST ['keterangan'];

$query = mysqli_query($koneksi, "INSERT INTO tb_absensi (id_siswa,tanggal,statuss,keterangan) VALUES ('$id_siswa','$tanggal','$statuss','$keterangan')");

if ($query){
    if ($_SESSION['role'] == 'siswa') {
        echo "<script>alert('Absen Berhasil Diambil');window.location.href='?page=absensi/absen';</script>";
    }
    echo "<script>alert('Data Berhasil Ditambahkan');window.location.href='?page=absensi/index';</script>";
}else{
    echo "<script>alert('Data Gagal Ditambahkan');window.location.href='?page=absensi/tambah';</script>";

}


?>
