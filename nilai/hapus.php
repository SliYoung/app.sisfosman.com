<?php
$id_siswa = $_GET['id_siswa'];
$id_nilai = $_GET['id_nilai'];


$query = mysqli_query($koneksi, "DELETE FROM tb_nilai WHERE id_nilai='$id_nilai'");

if ($query){
    echo "<script>alert('Data Berhasil Dihapus');window.location.href='?page=nilai/index&id_siswa=$id_siswa';</script>";
}else{
    echo "<script>alert('Data Gagal Dihapus');window.location.href='?page=nilai/index&id_siswa=$id_siswa';</script>";
}
?>
