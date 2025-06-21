<?php

$id_tugas = $_POST ['id_tugas'];
$id_jadwal_pelajaran= $_POST ['id_jadwal_pelajaran'];
$judul= $_POST ['judul'];
$deskripsi= $_POST ['deskripsi'];
$tanggal= $_POST ['tanggal'];
$deadline= $_POST ['deadline'];

if ($_FILES['file_tugas']['name'] == '') {
    $file_tugas = $_POST['file_tugas_lama'];
} else {
    $file = $_FILES['file_tugas']['name'];
    $file_tugas = uniqid() . $file;
    $namaSementara = $_FILES['file_tugas']['tmp_name'];

    unlink('files/' . $_POST['file_tugas_lama']);
    $terupload = move_uploaded_file($namaSementara, 'files/' . $file_tugas);
}

$query = mysqli_query($koneksi, "UPDATE tb_tugas SET id_jadwal_pelajaran='$id_jadwal_pelajaran',judul='$judul',deskripsi='$deskripsi',deadline='$deadline',tanggal='$tanggal',file_tugas='$file_tugas' WHERE id_tugas='$id_tugas'");

if ($query){
    echo "<script>alert('Data Berhasil DiUpdate');window.location.href='?page=tugas/index';</script>";
}else{
    echo "<script>alert('Data Gagal DiUpdate');window.location.href='?page=tugas/edit&id_tugas=$id_tugas';</script>";

}


?>
