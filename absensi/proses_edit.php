<?php

$id_absensi = $_POST ['id_absensi'];
$id_siswa= $_POST ['id_siswa'];
$tanggal= $_POST ['tanggal'];
$statuss= $_POST ['statuss'];
$keterangan= $_POST ['keterangan'];

$query = mysqli_query($koneksi, "UPDATE tb_absensi SET id_siswa='$id_siswa',tanggal='$tanggal',statuss='$statuss',keterangan='$keterangan' WHERE id_absensi='$id_absensi'");

if ($query){
    echo "<script>alert('Data Berhasil DiUpdate');window.location.href='?page=absensi/index';</script>";
}else{
    echo "<script>alert('Data Gagal DiUpdate');window.location.href='?page=absensi/edit&id_absensi=$id_absensi';</script>";

}


?>
