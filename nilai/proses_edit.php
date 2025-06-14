<?php

$id_nilai = $_POST ['id_nilai'];
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



$query = mysqli_query($koneksi, "UPDATE tb_nilai SET id_siswa='$id_siswa',id_mapel='$id_mapel',semester='$semester',tahun_ajaran='$tahun_ajaran',nilai_angka='$nilai_angka',nilai_huruf='$nilai_huruf' WHERE id_nilai='$id_nilai'");

if ($query){
    echo "<script>alert('Data Berhasil DiUpdate');window.location.href='?page=nilai/index';</script>";
}else{
    echo "<script>alert('Data Gagal DiUpdate');window.location.href='?page=nilai/edit&id_nilai=$id_nilai';</script>";

}


?>
