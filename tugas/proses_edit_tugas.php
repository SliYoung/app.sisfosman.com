<?php

$id_pengumpulan_tugas = $_POST ['id_pengumpulan_tugas'];
$catatan= $_POST ['catatan'];
$nilai= $_POST ['nilai'];
$status= $_POST ['status'];


$query = mysqli_query($koneksi, "UPDATE tb_pengumpulan_tugas SET catatan='$catatan',nilai='$nilai',status='$status' WHERE id_pengumpulan_tugas='$id_pengumpulan_tugas'");

if ($query){
    echo "<script>alert('Data Berhasil Diupdate');window.location.href='?page=tugas/nilai_tugas&id_tugas=" . $_POST['id_tugas'] . "';</script>";
}else{
    echo "<script>alert('Data Gagal DiUpdate');window.location.href='?page=absensi/edit&id_absensi=$id_absensi';</script>";

}


?>
