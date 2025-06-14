<?php

$id_siswa= $_POST ['id_siswa'];
$id_mapel= $_POST ['id_mapel'];
$semester= $_POST ['semester'];
$tahun_ajaran= $_POST ['tahun_ajaran'];
$nilai_angka= $_POST ['nilai_angka'];
$nilai_huruf= $_POST ['nilai_huruf'];

if ($nilai_angka >= 85) {
    $nilai_huruf = 'A';
} elseif ($nilai_angka >= 75) {
    $nilai_huruf = 'B';
} elseif ($nilai_angka >= 60) {
    $nilai_huruf = 'C';
} elseif ($nilai_angka >= 50) {
    $nilai_huruf = 'D';
} else {
    $nilai_huruf = 'E';
}

$query = mysqli_query($koneksi, "INSERT INTO tb_nilai(id_siswa,id_mapel,semester,tahun_ajaran,nilai_angka,nilai_huruf) VALUES ('$id_siswa','$id_mapel','$semester','$tahun_ajaran','$nilai_angka','$nilai_huruf')");

if ($query){
    echo "<script>alert('Data Berhasil Ditambahkan');window.location.href='?page=nilai/index';</script>";
}else{
    echo "<script>alert('Data Gagal Ditambahkan');window.location.href='?page=nilai/tambah';</script>";

}


?>
