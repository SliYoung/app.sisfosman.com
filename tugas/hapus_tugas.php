<?php

$id_pengumpulan_tugas = $_GET['id_pengumpulan_tugas'];


$query = mysqli_query($koneksi, "DELETE FROM tb_pengumpulan_tugas WHERE id_pengumpulan_tugas = '$id_pengumpulan_tugas'");


if ($query) {
    echo "<script>alert('Data berhasil dihapus'); window.location.href='?page=tugas/nilai_tugas&id_tugas=$id_tugas';</script>";
} else {
    echo "<script>alert('Data gagal dihapus: " . mysqli_error($koneksi) . "'); window.history.back();</script>";
}
?>
